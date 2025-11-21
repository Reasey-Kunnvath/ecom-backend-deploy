<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskSkill extends Model
{
    protected $table = 'jsk_skills';
    protected $fillable = ['skill_name', 'skill_code', 'skill_category', 'skill_desc', 'is_active', 'created_by'];
    public function profiles()
    {
        return $this->belongsToMany(JskProfile::class, 'jsk_dc_profile_skill', 'skill_id', 'profile_id');
    }

    public function industry()
    {
        return $this->belongsTo(GenIndustry::class, 'skill_category', 'id');
    }

    public function jobs()
    {
        return $this->belongsToMany(JobPosting::class, 'dc_job_skills', 'skill_id', 'job_id');
    }
    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('skill_name', 'ILIKE', "%$value%")->orWhere('skill_code', 'ILIKE', "%$value%");
        }
        return $query->where('skill_name', 'ILIKE', "%$value%")->orWhere('skill_code', 'ILIKE', "%$value%");
    }
}
