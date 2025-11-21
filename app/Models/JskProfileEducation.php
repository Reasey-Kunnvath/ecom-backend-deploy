<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskProfileEducation extends Model
{
    protected $table = 'jsk_profile_education';

    protected $fillable = [
        'institution_name',
        'degree',
        'fos',
        'start_date',
        'end_date',
        'description',
        'profile_id'
    ];

    public function jskProfile()
    {
        return $this->belongsTo(JskProfile::class);
    }
}
