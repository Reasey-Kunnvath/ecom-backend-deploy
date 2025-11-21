<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    protected $table = 'stripe_customer';

    protected $fillable = [
        'user_id',
        'stripe_customer_id',
        'email',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment_method()
    {
        return $this->hasMany(StripePaymentMethod::class, 'stripe_customer_id', 'id');
    }
}
