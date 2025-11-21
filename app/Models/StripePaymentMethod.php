<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripePaymentMethod extends Model
{
    protected $table = 'stripe_payment_method';

    protected $fillable = [
        'stripe_customer_id',
        'stripe_payment_method_id',
        'card_type',
        'last4',
        'exp_month',
        'exp_year',
        'billing_name',
        'billing_email',
        'billing_address',
        'billing_address2',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_country',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(StripeCustomer::class, 'stripe_customer_id', 'id');
    }
}