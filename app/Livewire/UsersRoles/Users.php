<?php

namespace App\Livewire\UsersRoles;

use App\Models\JskProfile;
use App\Models\Role;
use App\Models\User;
use App\Trait\HasNotification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Users Module')]
class Users extends Component
{
    use WithPagination;
    use HasNotification;
    public $search = '';
    public $getUserId;
    public $userName, $userEmail, $userRole, $emailVerifiedAt, $userCreatedAt, $userUpdatedAt, $status, $role;
    public $first_name, $last_name, $workEmail, $phoneNumber, $address, $city, $birthday, $country, $profileDesc;
    public array $skill = [], $experience = [], $education = [], $certificate = [];

    public $viewMode = false, $editMode = false, $addMode = false;
    public function resetForm()
    {
        $this->reset([
            'userName',
            'userEmail',
            'userRole',
            'emailVerifiedAt',
            'userCreatedAt',
            'userUpdatedAt',
            'status',
            'first_name',
            'last_name',
            'workEmail',
            'phoneNumber',
            'address',
            'city',
            'birthday',
            'country',
            'profileDesc',
            'skill',
            'experience',
            'education',
            'certificate',
            'role',
        ]);
    }
    public function add_user_modal()
    {
        $this->addMode = true;
        $this->viewMode = false;
        $this->editMode = false;
        $this->resetForm();
        $this->dispatch('show-modal');
    }
    public function show_view_modal($id)
    {
        $this->viewMode = true;
        $this->editMode = false;
        $this->addMode = false;
        $this->dispatch('show-modal');
        $this->getUserId = $id;

        //Block to fetch user data
        $user = User::find($this->getUserId);
        $this->userName = $user->name ?? '';
        $this->userEmail = $user->email ?? '';
        $this->userRole = $user->role ?? '';
        if ($user->email_verified_at == null) {
            $this->emailVerifiedAt = 'N/A';
        } else {
            $this->emailVerifiedAt = $user->email_verified_at->format('d-M-Y') ?? '';
        }
        if ($user->created_at == null) {
            $this->userCreatedAt = 'N/A';
        } else {
            $this->userCreatedAt = $user->created_at->format('d-M-Y') ?? '';
        }
        if ($user->updated_at == null) {

            $this->userUpdatedAt = 'N/A';
        } else {
            $this->userUpdatedAt = $user->updated_at->format('d-M-Y') ?? '';
        }
        $this->status = $user->status ?? '';

        //Block to fetch profile data
        $profile = DB::selectOne('SELECT fn_get_profile_data(?) as data', [$this->getUserId]);
        $data = json_decode($profile->data, true);
        // dd($data);
        $this->first_name = $data[0]['first_name'] ?? 'N/A';
        $this->last_name = $data[0]['last_name'] ?? '';
        $this->workEmail = $data[0]['work_email'] ?? '';
        $this->phoneNumber = $data[0]['phone_number'] ?? '';
        $this->address = $data[0]['address'] ?? '';
        $this->city = $data[0]['city'] ?? '';
        $this->birthday = $data[0]['date_of_birth'] ?? '';
        $this->profileDesc = $data[0]['profile_desc'] ?? '';
        $this->country = $data[0]['country'] ?? '';
        $this->skill = array_map(function ($item) {
            return (object) [
                'skill_name' => $item['skill_name'] ?? '',
            ];
        }, $data[0]['skill'] ?? []);
        $this->experience = array_map(function ($item) {
            return (object) [
                'job_title' => $item['job_title'] ?? '',
                'company_name' => $item['company_name'] ?? '',
                'start_date' => $item['start_date'] ?? '',
                'end_date' => $item['end_date'] ?? '',
            ];
        }, $data[0]['experience'] ?? []);
        $this->education = array_map(function ($item) {
            return (object) [
                'institution_name' => $item['institution_name'] ?? '',
                'degree' => $item['degree'] ?? '',
                'field_of_study' => $item['field_of_study'] ?? '',
                'start_date' => $item['start_date'] ?? '',
                'end_date' => $item['end_date'] ?? '',
            ];
        }, $data[0]['education'] ?? []);
        $this->certificate = array_map(function ($item) {
            return (object) [
                'certificate_title' => $item['certificate_title'] ?? '',
                'issued_org' => $item['issued_org'] ?? '',
                'issued_date' => $item['issued_date'] ?? '',
            ];
        }, $data[0]['certificate'] ?? []);
    }
    public function show_edit_modal($id)
    {
        $this->viewMode = false;
        $this->editMode = true;
        $this->addMode = false;
        $this->dispatch('show-modal');
        $this->getUserId = $id;
        $user = User::find($this->getUserId);
        $this->userName = $user->name ?? '';
        $this->userEmail = $user->email ?? '';
        $this->userRole = $user->role ?? '';
        if ($user->email_verified_at == null) {
            $this->emailVerifiedAt = 'N/A';
        } else {
            $this->emailVerifiedAt = $user->email_verified_at->format('d-M-Y') ?? '';
        }
        if ($user->created_at == null) {
            $this->userCreatedAt = 'N/A';
        } else {
            $this->userCreatedAt = $user->created_at->format('d-M-Y') ?? '';
        }
        if ($user->updated_at == null) {

            $this->userUpdatedAt = 'N/A';
        } else {
            $this->userUpdatedAt = $user->updated_at->format('d-M-Y') ?? '';
        }
        $this->status = $user->status ?? '';

        //Block to fetch profile data
        $profile = DB::selectOne('SELECT fn_get_profile_data(?) as data', [$this->getUserId]);
        $data = json_decode($profile->data, true);
        // dd($data);
        $this->first_name = $data[0]['first_name'] ?? 'N/A';
        $this->last_name = $data[0]['last_name'] ?? '';
        $this->workEmail = $data[0]['work_email'] ?? '';
        $this->phoneNumber = $data[0]['phone_number'] ?? '';
        $this->address = $data[0]['address'] ?? '';
        $this->city = $data[0]['city'] ?? '';
        $this->birthday = $data[0]['date_of_birth'] ?? '';
        $this->profileDesc = $data[0]['profile_desc'] ?? '';
        $this->country = $data[0]['country'] ?? '';
        $this->skill = array_map(function ($item) {
            return (object) [
                'skill_name' => $item['skill_name'] ?? '',
            ];
        }, $data[0]['skill'] ?? []);
        $this->experience = array_map(function ($item) {
            return (object) [
                'job_title' => $item['job_title'] ?? '',
                'company_name' => $item['company_name'] ?? '',
                'start_date' => $item['start_date'] ?? '',
                'end_date' => $item['end_date'] ?? '',
            ];
        }, $data[0]['experience'] ?? []);
        $this->education = array_map(function ($item) {
            return (object) [
                'institution_name' => $item['institution_name'] ?? '',
                'degree' => $item['degree'] ?? '',
                'field_of_study' => $item['field_of_study'] ?? '',
                'start_date' => $item['start_date'] ?? '',
                'end_date' => $item['end_date'] ?? '',
            ];
        }, $data[0]['education'] ?? []);
        $this->certificate = array_map(function ($item) {
            return (object) [
                'certificate_title' => $item['certificate_title'] ?? '',
                'issued_org' => $item['issued_org'] ?? '',
                'issued_date' => $item['issued_date'] ?? '',
            ];
        }, $data[0]['certificate'] ?? []);
        // Logic to show edit modal
    }
    public function updateUser()
    {
        $user = User::find($this->getUserId);
        $user->name = $this->userName;
        $user->email = $this->userEmail;
        $user->role = $this->userRole;
        $user->status = $this->status;
        $user->save();
        $this->sweetSuccess('User updated successfully!');
        // Logic to update user data
    }
    public function updateUserProfile()
    {
        $profile = JskProfile::where('user_id', $this->getUserId)
            ->first();
        $profile->first_name = $this->first_name;
        $profile->last_name = $this->last_name;
        $profile->work_email = $this->workEmail;
        $profile->phone_number = $this->phoneNumber;
        $profile->address = $this->address;
        $profile->city = $this->city;
        $profile->date_of_birth = $this->birthday;
        $profile->country = $this->country;
        $profile->profile_desc = $this->profileDesc;
        $profile->save();
        $this->sweetSuccess('User profile updated successfully!');
        // Logic to update user profile data
    }
    public function deleteConfirm($id)
    {
        $this->getUserId = $id;
    }
    public function delete()
    {
        DB::table('users')->where('id', $this->getUserId)->delete();
        $this->fetchUsers();
        $this->sweetSuccess('User deleted successfully!');
    }
    public function fetchUsers()
    {
        // Logic to fetch users from the database
        return User::Search($this->search)->orderBy('id', 'asc')->paginate(8);
    }
    public function fetchRolesList()
    {
        return Role::select('role_name')->orderBy('role_name', 'ASC')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.users-roles.users', [
            'users' => $this->fetchUsers(),
            'roles' => $this->fetchRolesList(),

        ]);
    }
}