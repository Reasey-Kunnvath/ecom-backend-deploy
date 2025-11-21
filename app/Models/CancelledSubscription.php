<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancelledSubscription extends Model
{
    protected $table = 'cancelled_subscription';
    protected $fillable = [
        'user_id',
        'stripe_subscription_id',
        'cancelled_at',
        'effective_date',
        'reason',
    ];
}