<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribedUser extends Model
{
    protected $table = 'subscribed_users';

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'stripe_subscription_id',
        'start_date',
        'end_date',
        'is_active',
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function scopeSearch($query, $value){
        if ($value == null) {
            return $query->where('subscription_plan_id', 'ILIKE', "%$value%");
        }
        return $query->where('subscription_plan_id', 'ILIKE', "%$value%");
    }

    public function scopeExpired($query)
    {
        return $query->where('end_date', '<', now());
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id', 'plan_code');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'stripe_subscription_id', 'stripe_subscription_id');
    }
}
