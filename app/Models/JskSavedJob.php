<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JskSavedJob extends Model
{
    protected $table = 'jsk_saved_jobs';

    protected $fillable = [
        'saved_date',
        'job_id',
        'jsk_user_id',
    ];

    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'jsk_user_id');
    }
}