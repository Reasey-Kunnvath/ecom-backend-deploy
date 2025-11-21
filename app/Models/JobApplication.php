<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'application_date',
        'application_status',
        'job_posting_id',
        'application_type',
        'cv_path',
        'applicant_id',
        'cover_letter'
    ];

    // Relationships
    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
    // public function scopeSearch($query, $value)
    // {
    //     if ($value == null) {
    //         return $query->where('job_title', 'ILIKE', "%$value%")
    //             ->orWhere('job_type', 'ILIKE', "%$value%")
    //             ->orWhere('work_mode', 'ILIKE', "%$value%")
    //             ->orWhere('min_salary', 'ILIKE', "%$value%")
    //             ->orWhere('is_active', 'ILIKE', "%$value%")
    //             ->orWhere('ccy', 'ILIKE', "%$value%");
    //     }
    //     return $query->where('job_title', 'ILIKE', "%$value%")
    //         ->orWhere('job_type', 'ILIKE', "%$value%")
    //         ->orWhere('work_mode', 'ILIKE', "%$value%")
    //         ->orWhere('min_salary', 'ILIKE', "%$value%")
    //         ->orWhere('is_active', 'ILIKE', "%$value%")
    //         ->orWhere('ccy', 'ILIKE', "%$value%");
    // }
}
