<?php

namespace App\Livewire\UsersRoles;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('User Role Dashboard')]
class UserRoleDashboard extends Component
{
    public $activeUsers;
    public $inactiveUsers;
    public $verifiedUsers;
    public $unverifiedUsers;
    public $jobSeekers;
    public $employers;
    public $registeredLast30Days;
    public $rolesCount;
    public function mount()
    {
        $this->activeUsers = User::where('status', 'true')->count();
        $this->inactiveUsers = User::where('status', 'false')->count();
        $this->verifiedUsers = User::whereNotNull('email_verified_at')->count();
        $this->unverifiedUsers = User::whereNull('email_verified_at')->count();
        $this->jobSeekers = User::where('role', 'JSK')->count();
        $this->employers = User::where('role', 'EMP')->count();
        $this->registeredLast30Days = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $this->rolesCount = Role::count();
    }
    public function render()
    {
        return view('livewire.users-roles.user-role-dashboard');
    }
}
