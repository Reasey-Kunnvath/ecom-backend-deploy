<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $table = 'job_postings';

    protected $fillable = [
        'job_title',
        'job_desc',
        'responsibilities',
        'req_experience',
        'req_education',
        'req_certificate',
        'job_type',
        'work_mode',
        'min_salary',
        'max_salary',
        'ccy',
        'job_location',
        'posted_date',
        'expire_date',
        'maker_id',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'req_experience'  => 'array',
        'req_education'  => 'array',
        'req_certificate' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'maker_id');
    }
    public function skills()
    {
        return $this->belongsToMany(JskSkill::class, 'dc_job_skills', 'job_id', 'skill_id');
    }
    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('job_title', 'ILIKE', "%$value%")
                ->orWhere('job_type', 'ILIKE', "%$value%")
                ->orWhere('work_mode', 'ILIKE', "%$value%")
                ->orWhere('min_salary', 'ILIKE', "%$value%")
                ->orWhere('is_active', 'ILIKE', "%$value%")
                ->orWhere('ccy', 'ILIKE', "%$value%");
        }
        return $query->where('job_title', 'ILIKE', "%$value%")
            ->orWhere('job_type', 'ILIKE', "%$value%")
            ->orWhere('work_mode', 'ILIKE', "%$value%")
            ->orWhere('min_salary', 'ILIKE', "%$value%")
            ->orWhere('is_active', 'ILIKE', "%$value%")
            ->orWhere('ccy', 'ILIKE', "%$value%");
    }
}
