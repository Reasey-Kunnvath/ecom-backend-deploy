<?php
namespace App\Services;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\SetupIntent;
use Stripe\Subscription;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Illuminate\Support\Str;
use App\Models\StripeCustomer;

class StripePaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createCustomer(array $data)
    {
        return Customer::create([
            'email' => $data['email'] ?? null,
            'name' => $data['name'] ?? null,
            'metadata' => [
                'user_id' => $data['user_id'] ?? null,
            ],
        ]);
    }

    public function createSetupIntent(string $customerId)
    {
        return SetupIntent::create([
            'customer' => $customerId,
            'usage' => 'off_session',
        ]);
    }

    public function attachPaymentMethodToCustomer(string $pmId, string $customerId)
    {
        $pm = PaymentMethod::retrieve($pmId);
        $pm->attach(['customer' => $customerId]);

        Customer::update($customerId, [
            'invoice_settings' => [
                'default_payment_method' => $pmId,
            ],
        ]);

        return $pm;
    }

    public function createAndConfirmPaymentIntent($customerId, $paymentMethodId, int $amountCents, $currency = 'usd', array $opts = [])
    {
        $idempotencyKey = $opts['idempotency_key'] ?? (string) Str::uuid();

        try {
            $pi = PaymentIntent::create([
                'amount' => $amountCents,
                'currency' => $currency,
                'customer' => $customerId,
                'payment_method' => $paymentMethodId,
                'off_session' => true,
                'confirm' => true,
                'description' => $opts['description'] ?? null,
                'metadata' => $opts['metadata'] ?? null,
            ], ['idempotency_key' => $idempotencyKey]);

            return $pi;
        } catch (\Stripe\Exception\CardException $e) {
            $body = $e->getJsonBody();
            $err = $body['error'] ?? null;

            if ($err && isset($err['payment_intent']) && ($err['code'] ?? '') === 'authentication_required') {
                return (object)[
                    'requires_action' => true,
                    'payment_intent' => $err['payment_intent'],
                    'idempotency_key' => $idempotencyKey,
                ];
            }

            throw $e;
        }
    }

    /**
     * Create subscription with default_payment_method (for Pay Per Slot)
     * Returns subscription object; may include latest_invoice.payment_intent for SCA.
     */
    public function createSubscription($customerId, $priceId, $paymentMethodId, array $opts = [])
    {
        $sub = Subscription::create([
            'customer' => $customerId,
            'items' => [['price' => $priceId]],
            'default_payment_method' => $paymentMethodId,
            'expand' => ['latest_invoice.payment_intent'],
        ]);
        return $sub;
    }
}