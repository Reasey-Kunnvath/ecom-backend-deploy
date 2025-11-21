<?php

namespace App\Livewire\IndustrySkill;

use App\Models\GenIndustry;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\JskSkill;
use App\Trait\HasNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Skill Module')]
class Skill extends Component
{
    use WithPagination;
    use HasNotification;
    protected $listeners = ['deleteConfirmed' => 'delete'];
    public $isEditMode = false, $is_active = true, $isViewMode = false;
    public $skill_code, $skill_name,  $skill_category = 1, $getSkillId;
    public $skill_desc;


    #[Url(history: true)]
    public $search = '';
    public function resetFields()
    {
        $this->skill_code = null;
        $this->skill_name = '';
        $this->skill_desc = '';
        $this->skill_category = 1;
        $this->is_active = true;
        $this->isEditMode = false;
    }

    public function view_modal($id)
    {
        $this->resetFields();
        $this->isEditMode = false;
        $this->isViewMode = true;
        $this->getSkillId = $id;
        $this->dispatch('show-modal');
        $skill = JskSkill::findOrFail($this->getSkillId);
        $this->skill_code = $skill->skill_code;
        $this->skill_name = $skill->skill_name;
        $this->skill_desc = $skill->skill_desc;
        $this->skill_category = $skill->skill_category;
        $this->is_active = $skill->is_active;
    }
    public function edit_modal($id)
    {
        $this->resetFields();
        $this->isEditMode = true;
        $this->isViewMode = false;
        $this->getSkillId = $id;
        $this->dispatch('show-modal');

        $skill = JskSkill::findOrFail($this->getSkillId);
        $this->skill_code = $skill->skill_code;
        $this->skill_name = $skill->skill_name;
        $this->skill_desc = $skill->skill_desc;
        $this->skill_category = $skill->skill_category;
        $this->is_active = $skill->is_active;
    }
    public function update()
    {
        $skill = JskSkill::findOrFail($this->getSkillId);
        $skill->update([
            'skill_code' => $this->skill_code,
            'skill_name' => $this->skill_name,
            'skill_desc' => $this->skill_desc,
            'skill_category' => $this->skill_category,
            'is_active' => $this->is_active,
        ]);
        $this->resetFields();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Skill updated successfully!');
    }
    public function add_modal()
    {
        $this->isViewMode = false;
        $this->resetFields();
        $this->dispatch('show-modal');
    }
    public function store()
    {
        // Logic to fetch Store Skill to the database
        $this->validate(
            [
                'skill_code' => 'required|string|max:50',
                'skill_name' => 'required|string|max:255',
                'skill_desc' => 'nullable|string',
                'skill_category' => 'required',
            ]
        );
        $getUser = Auth::user()->name;
        JskSkill::create([
            'skill_code' => $this->skill_code,
            'skill_name' => $this->skill_name,
            'skill_desc' => $this->skill_desc,
            'skill_category' => $this->skill_category,
            'is_active' => $this->is_active,
            'created_by' => $getUser
        ]);
        $this->resetFields();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Skill added successfully!');
    }
    public function deleteConfirmed($id)
    {
        $this->getSkillId = $id;
        $this->sweetConfirmDelete('Are you sure you want to delete this skill ' . $id . ' ?');
    }
    public function delete()
    {
        $skill = JskSkill::findOrFail($this->getSkillId);
        $skill->delete();
        $this->sweetToastSuccess('Skill deleted successfully!');
    }
    public function fetchSkill()
    {
        // Logic to fetch skill from the database
        return JskSkill::Search($this->search)->orderBy('id', 'DESC')->paginate(8);
    }
    public function fetchSkillCategories()
    {
        // Logic to fetch Industry from the database
        return GenIndustry::where('is_active', true)->orderBy('industry_name', 'ASC')->get();
    }
    public function render()
    {
        return view('livewire.industry-skill.skill', [
            'skills' => $this->fetchSkill(),
            'skillCategories' => $this->fetchSkillCategories(),
        ]);
    }
}
