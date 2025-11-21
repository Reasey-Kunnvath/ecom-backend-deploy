<?php

namespace App\Livewire\JobApplication;

use App\Models\GenIndustry;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Job Application Dashboard')]
class JobAppDashboard extends Component
{
    public $totalActiveJobs;
    public $totalExpiredJobs;
    public $pendingApplications;
    public $acceptedApplications;
    public $rejectedApplications;
    public $totalIndustries;

    public $jobTrends = [];
    public $applicationTrends = [];
    public function mount()
    {
        // Total Jobs
        $this->totalActiveJobs = JobPosting::where('is_active', true)->count();
        $this->totalExpiredJobs = JobPosting::where('expire_date', '<', now())->count();

        // Applications
        $this->pendingApplications = JobApplication::where('application_status', 'pending')->count();
        $this->acceptedApplications = JobApplication::where('application_status', 'accepted')->count();
        $this->rejectedApplications = JobApplication::where('application_status', 'rejected')->count();

        // Industry
        $this->totalIndustries = GenIndustry::count();

        // Job posting trends (last 7 days)
        $this->jobTrends = JobPosting::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Job application trends (last 7 days)
        $this->applicationTrends = JobApplication::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();
    }
    public function render()
    {
        return view('livewire.job-application.job-app-dashboard');
    }
}
