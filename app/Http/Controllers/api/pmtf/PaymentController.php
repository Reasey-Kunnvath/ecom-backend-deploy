<?php

namespace App\Http\Controllers\api\pmtf;

use Stripe\Stripe;
use App\Models\Payment;
use Stripe\Subscription;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\StripePricing;
use App\Models\StripeCustomer;
use App\Models\SubscribedUser;
use App\Models\SubscriptionPlan;
use App\Models\StripePaymentMethod;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use App\Models\CancelledSubscription;
use App\Services\StripePaymentService;

#[Group('Stripe Payment')]
class PaymentController extends Controller
{
    protected $stripe;

    public function __construct(StripePaymentService $stripe)
    {
        $this->stripe = $stripe;
    }

    /**
     * Charge user per day for job posting (off session payment)
     */
    public function chargePerDay(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer',
            'days' => 'required|integer|min:1|max:30',
        ]);

        $user = $request->user();

        if(!$user->customer) {
            $customer = $this->stripe->createCustomer([
                'email' => $user->email,
                'name' => $user->name,
                'user_id' => $user->id,
            ]);

            $customer_id = $customer->id;
        }else{
            $customer_id = $user->customer->stripe_customer_id;
        }

        $days = (int) $request->days;

        $baseRate = 9.99;

        $price = $this->calculatePriceWithDiscount($days, $baseRate);

        $amountCents = (int) round($price * 100);

        $payment = Payment::create([
            'user_id' => $user->id,
            'stripe_payment_id' => $request->user()->customer->stripe_customer_id,
            'payment_type' => 'one_time',
            'amount' => $price,
            'currency' => 'usd',
            'status' => 'pending',
            'metadata' => [
                'post_id' => $request->post_id,
                'days' => $days,
            ],
            'idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        try{
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = Session::create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'customer' => $customer_id,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "Job Post #{$request->post_id} ({$days} days)",
                        ],
                        'unit_amount' => $amountCents,
                    ],
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'payment_id' => $payment->id,
                    'post_id' => $request->post_id,
                    'days' => $days,
                ],
                'success_url' => url(config('services.redirect.payment_success')),
                'cancel_url' => url(config('services.redirect.payment_cancel'))
            ]);

            $payment->stripe_checkout_session_id = $session->id;
            $payment->save();

            return response()->json([
                'url' => $session->url,
                'customer_id' => $user->customer->stripe_customer_id,
                'payment_id' => $payment->id,
            ]);

        }catch(\Exception $e){
            $payment->status = 'failed';
            $payment->save();

            return response()->json([
                'message' => 'Payment failed to process',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    protected function calculatePriceWithDiscount($days, $baseRate)
    {
        if ($days >= 30) $rate = $baseRate * (1 - 0.35);
        elseif ($days >= 14) $rate = $baseRate * (1 - 0.28);
        elseif ($days >= 7) $rate = $baseRate * (1 - 0.15);
        else $rate = $baseRate;

        return round($rate * $days, 2);
    }

    /**
     * Subscribe user to a plan (recurring payment)
     */
    public function planSubscription(Request $request)
    {
        $request->validate([
            'plan_code' => 'required|string|exists:subscription_plans,plan_code',
        ]);

        $user = $request->user();

        if(!$user->customer) {
            $customer_id = $this->createCustomer([
                'email' => $user->email,
                'name' => $user->name,
                'user_id' => $user->id,
            ]);
        }else{
            $customer_id = $user->customer->stripe_customer_id;
        }

        $isSubscribe = $user->subscribedUser()->where('is_active', true)->first();
        if($isSubscribe) {
            return response()->json([
                'message' => 'User need to cancel the current active subscription before subscribing to a new plan.',
            ], 400);
        }

        $price_id = SubscriptionPlan::where('plan_code', $request->plan_code)->value('stripe_price_id');
        $price = StripePricing::where('price_id', $price_id)->first();
        $plan = $request->plan_code;

        $payment = Payment::create([
            'user_id' => $user->id,
            'stripe_payment_id' => null,
            'payment_type' => 'subscription',
            'amount' => $price->amount,
            'currency' => 'usd',
            'status' => 'pending',
            'metadata' => [
                'plan' => $plan,
            ],
            'idempotency_key' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        try {
            $session = Session::create([
                'mode' => 'subscription',
                'payment_method_types' => ['card'],
                'customer' => $customer_id,
                'line_items' => [[
                    'price' => $price_id,
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'user_id' => $user->id,
                    'payment_id' => $payment->id,
                    'subscription_plan_id' => $plan,
                ],
                'success_url' => url(config('services.redirect.payment_success')),
                'cancel_url' => url(config('services.redirect.payment_cancel'))
            ]);

            $payment->stripe_checkout_session_id = $session->id;
            $payment->save();

            return response()->json([
                'url' => $session->url,
                'customer_id' => $customer_id,
                'payment_id' => $payment->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create subscription session',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function createCustomer(array $data){
        $customer = $this->stripe->createCustomer([
            'email' => $data['email'],
            'name' => $data['name'],
            'user_id' => $data['user_id'],
        ]);

        StripeCustomer::create([
            'user_id' => $customer->metadata->user_id,
            'stripe_customer_id' => $customer->id,
            'email' => $customer->email,
            'name' => $customer->name,
        ]);

        return $customer->id;
    }

    /**
     * Cancel subscription
     */
    public function cancelSubscription(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|string|exists:subscribed_users,stripe_subscription_id',
            'reason' => 'nullable|string|max:255',
            'cancel_immediately' => 'nullable|boolean',
        ]);

        try {
            $subscription = SubscribedUser::where('stripe_subscription_id', $request->subscription_id)->first();

            $sub = Subscription::retrieve($subscription->stripe_subscription_id);

            if ($request->cancel_immediately) {
                $sub->cancel([
                    'invoice_now' => true,
                    'prorate' => true,
                ]);
            } else {
                $sub->cancel_at_period_end = true;
                $sub->metadata = [
                    'cancellation_reason' => $request->reason,
                    'cancel_immediately' => false,
                ];
            }

            SubscribedUser::where('stripe_subscription_id', $request->subscription_id)->update([
                'is_active' => false,
                'status' => 'CANCELLED',
            ]);

            return response()->json([
                'message' => 'Subscription cancelled successfully',
                'subscription' => $subscription,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to cancel subscription',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
