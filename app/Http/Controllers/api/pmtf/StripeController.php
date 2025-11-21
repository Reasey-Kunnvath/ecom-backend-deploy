<?php

namespace App\Http\Controllers\api\pmtf;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\StripeCustomer;
use App\Models\SubscribedUser;
use App\Models\SubscriptionPlan;
use App\Models\StripePaymentMethod;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use App\Models\CancelledSubscription;
use App\Services\StripePaymentService;

#[Group('Stripe Util')]
class StripeController extends Controller
{
    protected $stripe;

    public function __construct(StripePaymentService $stripe)
    {
        $this->stripe = $stripe;
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    /**
     * Get All Stripe Customers
     */
    public function getStripeCustomer(Request $request)
    {


        $customer = StripeCustomer::get();

        return response()->json([
            'message' => 'Stripe Customer retrieved successfully',
            'customer' => $customer
        ], 200);
    }

    /**
     * Get current Stripe Customer
     */
    public function getCurrentStripeCustomer(Request $request)
    {
        $stripeCustomer = $request->user()->customer;

        if(!$stripeCustomer) {
            return response()->json([
                'message' => 'This user is not a Stripe Customer',
            ], 404);
        }

        return response()->json([
            'message' => 'Stripe Customer retrieved successfully',
            'customer' => $stripeCustomer
        ], 200);
    }

    /**
     * Check if a user is subscribed
     */
    public function isSubscribed(Request $request)
    {
        $user = $request->user();

        $isSubscribed = SubscribedUser::where('user_id', $user->id)
            ->where('is_active', true)->first();

        if (empty($isSubscribed)) {
            return response()->json([
                'message' => 'User is not subscribed',
                'is_subscribed' => false,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'message' => 'User is subscribed',
            'is_subscribed' => true,
            'subscription' => $isSubscribed
        ], 200);
    }

    /**
     * Get Users Subscription
     */
    public function getUserSubscription(Request $request)
    {
        $user = $request->user();

        $subscriptions = SubscribedUser::where('user_id', $user->id)->where('is_active', true)->with('subscriptionPlan')->get();

        if ($subscriptions->isEmpty()) {
            return response()->json([
                'message' => 'User does not have any active subscriptions',
                'is_subscribed' => false
            ], 404);
        }

        // Map subscriptions into an array for JSON
        $data = $subscriptions->map(function($subscription) {
            return [
                'plan_id' => $subscription->subscription_plan_id,
                'payment_date' => $subscription->start_date,
                'next_payment_date' => $subscription->end_date,
                'is_active' => $subscription->is_active,
                'stripe_subscription_id' => $subscription->stripe_subscription_id,
                'plan_name' => $subscription->subscriptionPlan->plan_name,
                'plan_price' => $subscription->subscriptionPlan->plan_price
            ];
        });

        return response()->json([
            'message' => 'User subscriptions retrieved successfully',
            'subscriptions' => $data
        ]);

    }

    /**
     * Create a Stripe Customer
     */
    public function createCustomer(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $userCustomer = $request->user();

        $customer = Customer::create([
            'email' => $userCustomer->email,
            'name' => $userCustomer->name,
        ]);

        StripeCustomer::create([
            'user_id' => $userCustomer->id,
            'stripe_customer_id' => $customer->id,
            'email' => $userCustomer->email,
            'name' => $userCustomer->name,
        ]);

        return response()->json([
            'message' => 'Stripe Customer created successfully',
            'customer' => $customer
        ], 200);
    }

    /**
     * Get Specific Subscription
     */
    public function getSubscription(Request $request){
        $request->validate([
            'stripe_subscription_id' => 'required|string|exists:subscribed_users,stripe_subscription_id',
        ]);

        $subscriptions = SubscribedUser::where('user_id', $request->user()->id)->where('stripe_subscription_id', $request->stripe_subscription_id)->get();

        return response()->json([
            'message' => 'Subscription retrieved successfully',
            'subscriptions' => $subscriptions
        ]);
    }

    /**
     * Create a Setup Intent for saving cards (Payment Methods)
     */
    public function createSetupIntent(Request $request)
    {
        $user = $request->user();
        $sc = StripeCustomer::where('user_id', $user->id)->first();
        $si = $this->stripe->createSetupIntent($sc->stripe_customer_id);

        return response()->json([
            'message' => 'Setup Intent created successfully',
            'client_secret' => $si->client_secret,
            'setup_intent' => $si
        ], 200);
    }

    /**
     * Attach a Payment Method to a Customer
     */
    public function attachCard(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = $request->user();
        $sc = StripeCustomer::where('user_id', $user->id)->firstOrFail();
        $pmId = $request->input('payment_method_id');

        try{
            $pm = $this->stripe->attachPaymentMethodToCustomer($pmId, $sc->stripe_customer_id);

            $stripePaymentMethod = StripePaymentMethod::create([
                'stripe_customer_id' => $sc->id,
                'stripe_payment_method_id' => $pm->id,
                'card_type' => $pm->card->brand,
                'last4' => $pm->card->last4,
                'exp_month' => $pm->card->exp_month,
                'exp_year' => $pm->card->exp_year,
                'billing_name' => $pm->billing_details->name,
                'billing_email' => $pm->billing_details->email,
                'billing_address' => $pm->billing_details->address->line1,
                'billing_address2' => $pm->billing_details->address->line2,
                'billing_city' => $pm->billing_details->address->city,
                'billing_state' => $pm->billing_details->address->state,
                'billing_zip' => $pm->billing_details->address->postal_code,
                'billing_country' => $pm->billing_details->address->country,
                'is_default' => true,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Card attached successfully',
            'payment_method' => $stripePaymentMethod
        ], 200);
    }
}