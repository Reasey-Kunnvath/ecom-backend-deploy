<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpAccRep extends Model
{
    protected $table = 'emp_account_representatives';

    protected $fillable = [
        'full_name',
        'job_title',
        'email',
        'phone_number',
        'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo(EmpProfile::class, 'profile_id', 'id');
    }
}
