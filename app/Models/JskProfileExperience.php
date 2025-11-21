<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskProfileExperience extends Model
{
    protected $table = 'jsk_profile_experience';

    protected $fillable = [
        'company_name',
        'company_address',
        'description',
        'job_title',
        'start_date',
        'end_date',
        'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo(JskProfile::class, 'profile_id');
    }


}
