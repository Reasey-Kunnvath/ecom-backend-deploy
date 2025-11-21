<?php

namespace App\Http\Controllers\webhook;

use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Payment;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Models\SubscribedUser;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CancelledSubscription;
use App\Http\Controllers\api\job\JobController;
use Stripe\Exception\SignatureVerificationException;

class StripeWebhookController extends Controller
{
    protected $job;
    public function __construct(JobController $job){
        $this->job = $job;
    }

    public function handle(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $endpoint_secret = config('services.stripe.webhook');

        $payload = @file_get_contents('php://input');
        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        } catch (SignatureVerificationException $e) {
            return response([
                'message' => 'Invalid signature'
            ], 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                if ($session->mode == 'subscription') {

                    $payment = Payment::where('stripe_checkout_session_id', $session->id)->first();
                    if ($payment) {
                        $payment->status = $session->payment_status;
                        $payment->stripe_invoice_id = $session->invoice;
                        $payment->stripe_subscription_id = $session->subscription;
                        $payment->payment_type = $session->payment_method_types[0];
                        $payment->save();
                    }

                    $subscribedUser = SubscribedUser::create([
                        'user_id' => $session->metadata->user_id,
                        'subscription_plan_id' => $session->metadata->subscription_plan_id,
                        'stripe_subscription_id' => $session->subscription,
                        'start_date' => now(),
                        'end_date' => now()->addMonth(),
                        'is_active' => true,
                        'status' => 'ACTIVE'
                    ]);

                    $this->job->jobActivation($subscribedUser->user_id, true);

                    return response([
                        'message' => 'Subscription successful',
                        'subscription' => $subscribedUser,
                        'session' => $session
                    ], 200);
                } elseif ($session->mode == 'payment') {
                    $payment = Payment::where('stripe_checkout_session_id', $session->id)->first();
                    if ($payment) {
                        $payment->status = 'succeeded';
                        $payment->stripe_payment_intent_id = $session->payment_intent;
                        $payment->save();
                    }

                    $metadata = $session->metadata;
                    if (isset($metadata->post_id) && isset($metadata->days)) {
                        $post = JobPosting::find($metadata->post_id);
                        if ($post) {
                            $post->is_featured = true;
                            $post->featured_expires_at = now()->addDays($metadata->days);
                            $post->save();
                        }
                    }
                }

                break;

            case 'customer.subscription.deleted':
                $session = $event->data->object;

                $subscribedUser = SubscribedUser::where('stripe_subscription_id', $session->id)->first();

                if ($subscribedUser) {
                    $subscribedUser->is_active = false;
                    $subscribedUser->status = strtoupper($session->status);
                    $subscribedUser->save();

                    CancelledSubscription::create([
                        'user_id' => $subscribedUser->user_id,
                        'stripe_subscription_id' => $subscribedUser->stripe_subscription_id,
                        'cancelled_at' => now(),
                        'effective_date' => $session->metadata->cancel_immediately ? now() : $subscribedUser->end_date,
                        'reason' =>  $session->metadata->cancellation_reason ?? 'No Reason Provided',
                    ]);

                    $this->job->jobActivation($subscribedUser->user_id, false);

                    return response ([
                        'message' => 'Subscription cancelled',
                        'subscription' => $subscribedUser,
                        'session' => $session
                    ], 200);
                }
                break;

            case 'payment_intent.payment_failed':
                $pi = $event->data->object;
                $paymentId = $pi->metadata->payment_id ?? null;

                if ($paymentId) {
                    $payment = Payment::find($paymentId);
                    if ($payment) {
                        $payment->status = 'failed';
                        $payment->save();
                    }
                }
                break;

            case 'customer.subscription.created':
                $subscription = $event->data->object;
                return response([
                    'message' => 'Subscription created',
                    'subscription' => $subscription
                ], 200);

            default:
                Log::info('Unhandled Stripe event: ' . $event->type);
        }

        return response([
            'received' => true,
            'event' => $event
        ], 200);
    }
}