<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripePricing extends Model
{
    protected $table = 'stripe_pricing';

    protected $fillable = [
        'product_id',
        'product_name',
        'price_id',
        'amount',
        'currency',
        'maker_id',
        'is_active'
    ];

    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('product_name', 'ILIKE', "%$value%");
        }
        return $query->where('product_name', 'ILIKE', "%$value%");
    }

    public function maker()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }

    public function plans()
    {
        // Foreign key = stripe_price_id (SubscriptionPlan)
        // Local key = price_id (StripePricing)
        return $this->hasMany(SubscriptionPlan::class, 'stripe_price_id', 'price_id');
    }
}