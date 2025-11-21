<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskProfileCertificate extends Model
{
    protected $table = 'jsk_profile_certificate';

    protected $fillable = [
        'profile_id',
        'certificate_title',
        'issued_org',
        'issued_date',
        'description',
    ];

    public function profile()
    {
        return $this->belongsTo(JskProfile::class, 'profile_id');
    }
}
