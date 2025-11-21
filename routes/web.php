<?php

use App\Http\Controllers\Dashboard\dashboardAuth;
use App\Livewire\Dashboard;
use App\Livewire\IndustrySkill\Industry;
use App\Livewire\IndustrySkill\IndustrySkillDashboard;
use App\Livewire\IndustrySkill\Skill;
use App\Livewire\UsersRoles\{
    UserRoleDashboard,
    Users,
    Roles
};
use App\Livewire\JobApplication\JobAppDashboard;
use App\Livewire\JobApplication\JobApplicationController;
use App\Livewire\JobApplication\JobPostingController;

use App\Livewire\PlanPricing\{
    Pricing,
    ServicePlan
};

use App\Livewire\PaymentSubscription\{
    UserPayment,
    Subscription
};

// use App\Livewire\
use Illuminate\Support\Facades\Route;


Route::get('/', [dashboardAuth::class, 'dashboardLoginForm'])->name('dashboardLoginForm');
Route::post('/dashboardLogin', [dashboardAuth::class, 'dashboardLogin'])->name('dashboardLogin');
Route::get('/dashboardLogout', [dashboardAuth::class, 'dashboardLogout'])->name('dashboardLogout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', Dashboard::class)->name('dashboard');
            // User and Role Management
            Route::get('/user_role_dashboard', UserRoleDashboard::class)->name('userRoleDashboard');
            Route::get('/user', Users::class)->name('user');
            Route::get('/role', Roles::class)->name('role');

            // Job and Application Management
            Route::get('/job_app_dashboard', JobAppDashboard::class)->name('jobAppDashboard');
            Route::get('/job_application', JobApplicationController::class)->name('jobApplication');
            Route::get('/job_posting', JobPostingController::class)->name('jobPosting');

            // Industry and skill Management
            Route::get('/industry_skill_dashboard', IndustrySkillDashboard::class)->name('industrySkillDashboard');
            Route::get('/industry', Industry::class)->name('industry');
            Route::get('/skill', Skill::class)->name('skill');

            // Route::get('/services', Service::class)->name('service');
            Route::get('/service-plan', ServicePlan::class)->name('servicePlan');
            Route::get('/pricing', Pricing::class)->name('pricing');

            Route::get('/payments', UserPayment::class)->name('payment');
            Route::get('/subscriptions', Subscription::class)->name('subscription');
        });
    });
});

// Route::get('/', function () {
//     return view('login');
// });
