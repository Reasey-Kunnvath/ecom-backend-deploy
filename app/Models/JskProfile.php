<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskProfile extends Model
{
    protected $table = 'jsk_profiles';

    protected $fillable = ['date_of_birth', 'user_id', 'phone_number', 'profile_img', 'address', 'city', 'country', 'profile_desc', 'first_name', 'last_name', 'work_email'];

    // protected $hidden = ['profile_img'];
    // protected $appends = ['profile_img_url'];

    // public function getProfileImgUrlAttribute()
    // {
    //     return $this->profile_img ? asset('storage/' . $this->profile_img) : null;
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skills()
    {
        return $this->belongsToMany(JskSkill::class, 'jsk_dc_profile_skill', 'profile_id', 'skill_id');
    }

    public function experience()
    {
        return $this->hasMany(JskProfileExperience::class, 'profile_id');
    }

    public function education()
    {
        return $this->hasMany(JskProfileEducation::class, 'profile_id');
    }

    public function certificates()
    {
        return $this->hasMany(JskProfileCertificate::class, 'profile_id');
    }
}
