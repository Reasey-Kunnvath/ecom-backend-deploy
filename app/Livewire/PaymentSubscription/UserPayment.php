<?php

namespace App\Livewire\PaymentSubscription;

use Stripe\Stripe;
use Livewire\Component;
use Stripe\Subscription;
use App\Models\Payment as Payments;
use Stripe\Invoice;

class UserPayment extends Component
{
    public $search = '';
    public $stripe_invoice_id;
    public $stripe_subscription_id;
    public $user_id;
    public $user_name;
    public $payment_type;
    public $amount;
    public $currency;
    public $status;
    public $metadata;
    public $payment_date;
    public $last_update;

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function openViewModal($id){
        $payment = Payments::find($id);

        $this->stripe_invoice_id = $payment->stripe_invoice_id;
        $this->stripe_subscription_id = $payment->stripe_subscription_id;
        $this->user_id = $payment->user_id;
        $this->user_name = $payment->user->name;
        $this->payment_type = $payment->payment_type;
        $this->amount = $payment->amount;
        $this->currency = $payment->currency;
        $this->status = $payment->status;
        $this->metadata = $payment->metadata;
        $this->payment_date = $payment->payment_date;
        $this->last_update = $payment->last_update;

        $this->dispatch('show-modal');
    }

    public function fetchPayment(){
        return Payments::Search($this->search)->orderBy('payments.id', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.payment-subscription.payment', [
            'payments' => $this->fetchPayment()
        ]);
    }
}
