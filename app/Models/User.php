<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'email_verified_at',
        'account_type'
    ];

    protected $dates = [
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jskProfile()
    {
        return $this->hasOne(JskProfile::class, 'user_id');
    }

    public function empProfile()
    {
        return $this->hasOne(EmpProfile::class, 'user_id');
    }

    public function customer()
    {
        return $this->hasOne(StripeCustomer::class, 'user_id');
    }

    public function subscribedUser()
    {
        return $this->hasOne(SubscribedUser::class, 'user_id');
    }

    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('name', 'ILIKE', "%$value%");
        }
        return $query->where('name', 'ILIKE', "%$value%");
    }
}