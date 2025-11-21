<?php

namespace App\Livewire;

use App\Models\GenIndustry;
use App\Models\JobApplication;
use App\Models\JobPosting;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('JOB HZ Dashboard')]
class Dashboard extends Component
{
    public $activeJobs, $expiredJobs;
    public $pendingApps, $acceptedApps, $rejectedApps;
    public $totalIndustries;
    public $postingTrends, $applicationTrends, $jobTrends7, $applicationTrends7;

    // User stats
    public $activeUsers, $inactiveUsers;
    public $verifiedUsers, $unverifiedUsers;
    public $jobSeekers, $employers;
    public $recentRegistered, $totalRoles;

    public function mount()
    {
        $today = Carbon::today();

        // === Job Posts ===
        $this->activeJobs = JobPosting::where('expire_date', '>=', $today)->count();
        $this->expiredJobs = JobPosting::where('expire_date', '<', $today)->count();

        // === Applications ===
        $this->pendingApps  = JobApplication::where('application_status', 'pending')->count();
        $this->acceptedApps = JobApplication::where('application_status', 'accepted')->count();
        $this->rejectedApps = JobApplication::where('application_status', 'rejected')->count();

        // === Industry ===
        $this->totalIndustries = GenIndustry::count();

        // === Users ===
        $this->activeUsers   = User::where('status', true)->count();
        $this->inactiveUsers = User::where('status', false)->count();
        $this->verifiedUsers = User::where('email_verified_at', '!=', null)->count();
        $this->unverifiedUsers = User::where('email_verified_at', null)->count();

        $this->jobSeekers = User::where('role', 'JOB SEEKER')->count();
        $this->employers  = User::where('role', 'EMPLOYER')->count();


        $this->recentRegistered = User::where('created_at', '>=', now()->subDays(30))->count();
        $this->totalRoles = Role::count();


        // === Trends ===
        $this->postingTrends = JobPosting::select(
            DB::raw("DATE_TRUNC('week', created_at) AS week_start"),
            DB::raw('COUNT(*) AS total')
        )
            ->where('created_at', '>=', now()->subWeeks(6))
            ->groupBy('week_start')
            ->orderBy('week_start')
            ->get();


        $this->applicationTrends = JobApplication::select(
            DB::raw("DATE_TRUNC('week', created_at) AS week_start"),
            DB::raw('COUNT(*) AS total')
        )
            ->where('created_at', '>=', now()->subWeeks(6))
            ->groupBy('week_start')
            ->orderBy('week_start')
            ->get();
        // dd($this->applicationTrends);
        // Job application trends (last 7 days)
        $this->jobTrends7 = JobPosting::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Job application trends (last 7 days)
        $this->applicationTrends7 = JobApplication::select(
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
        return view('livewire.dashboard');
    }
}
