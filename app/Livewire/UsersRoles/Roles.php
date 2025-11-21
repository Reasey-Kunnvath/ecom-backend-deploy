<?php

namespace App\Livewire\UsersRoles;

use App\Models\Role;
use App\Models\User;
use App\Trait\HasNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Roles Module')]
class Roles extends Component
{
    use WithPagination;
    use HasNotification;
    public $role_name;
    public $role_desc;
    public $is_active = true;
    public $getRoleID;

    #[Url(history: true)]
    public $search = '';
    public function deleteConfirm($id)
    {
        $this->getRoleID = $id;
    }
    public function delete()
    {
        DB::table('roles')->where('id', $this->getRoleID)->delete();
        $this->fetchRoles();
        $this->sweetSuccess('Role deleted successfully!');
    }

    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        $this->getRoleID = $role->id;
        $this->role_name = $role->role_name;
        $this->role_desc = $role->role_desc;
        $this->is_active = $role->is_active;
    }
    public function update()
    {
        $this->validate([
            'role_name' => 'required|string|max:255',
            'role_desc' => 'nullable|string',
        ]);

        DB::table('roles')->where('id', $this->getRoleID)->update([
            'role_name' => $this->role_name,
            'role_desc' => $this->role_desc,
            'is_active' => $this->is_active,
        ]);
        $this->resetForm();
        $this->sweetSuccess('Role updated successfully!');
    }
    public function resetForm()
    {
        $this->reset(['role_name', 'role_desc', 'is_active']);
    }
    public function create()
    {

        $this->validate([
            'role_name' => 'required|string|max:255',
            'role_desc' => 'nullable|string',
        ]);

        Role::create([
            'role_name' => $this->role_name,
            'role_desc' => $this->role_desc,
            'is_active' => $this->is_active,
            'created_by' => Auth::user()->id,
        ]);

        // Reset form fields
        $this->reset(['role_name', 'role_desc', 'is_active']);

        // Notify success
        $this->sweetSuccess('Role created successfully!');
    }
    public function fetchRoles()
    {
        // Logic to fetch roles from the database
        return Role::Search($this->search)->orderBy('id', 'ASC')->paginate(8);
    }
    public function render()
    {
        return view('livewire.users-roles.roles', [
            'roles' => $this->fetchRoles(),
        ]);
    }
}
