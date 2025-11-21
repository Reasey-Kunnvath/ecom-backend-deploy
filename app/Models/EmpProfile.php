<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpProfile extends Model
{
    protected $table = 'emp_profiles';

    protected $fillable = [
        'company_name',
        'company_size',
        'industry',
        'hq_address',
        'description',
        'company_img',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
