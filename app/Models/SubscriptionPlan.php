<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plans';

    protected $fillable = [
        'plan_code',
        'plan_name',
        'plan_price',
        'plan_description',
        'plan_duration',
        'max_post',
        'is_active',
        'plan_features',
        'stripe_price_id'
    ];

    protected $casts = [
        // 'plan_price' => 'decimal:2',
        'plan_features' => 'array',
    ];
    public function setPlanCodeAttribute($value)
    {
        $this->attributes['plan_code'] = strtoupper(trim($value));
    }

    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('plan_name', 'ILIKE', "%$value%");
        }
        return $query->where('plan_name', 'ILIKE', "%$value%");
    }

    public function subscribedUser(){
        return $this->hasMany(SubscribedUser::class,'subscription_plan_id', 'plan_code');
    }

    public function stripePricing()
    {
        // Local key = stripe_price_id (SubscriptionPlan)
        // Owner key = price_id (StripePricing)
        return $this->belongsTo(StripePricing::class, 'stripe_price_id', 'price_id');
    }

}
