<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'invoice_id',
        'stripe_checkout_session_id',
        'amount',
        'currency',
        'status',
        'metadata',
        'idempotency_key',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('payments.stripe_subscription_id', 'ILIKE', "%$value%");
        }
        return $query->where('payments.stripe_subscription_id', 'ILIKE', "%$value%");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }
}