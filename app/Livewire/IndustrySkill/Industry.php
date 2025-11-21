<?php

namespace App\Livewire\IndustrySkill;

use App\Models\GenIndustry;
use App\Trait\HasNotification;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('Industry Module')]
class Industry extends Component
{
    use WithPagination;
    use HasNotification;
    public $industry_name, $industry_code, $desc, $is_active = true;
    public $isEditMode = false;
    public $getIndustryId;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    #[Url(history: true)]
    public $search = '';

    public function resetFields()
    {
        $this->industry_name = '';
        $this->industry_code = null;
        $this->desc = '';
        $this->is_active = true;
        $this->isEditMode = false;
    }
    public function add_modal()
    {
        $this->resetFields();
        $this->dispatch('show-modal');
    }
    public function store()
    {
        $this->validate(
            [
                'industry_code' => 'required|string|max:50|unique:gen_industry,industry_code',
                'industry_name' => 'required|string|max:255',
                'desc' => 'nullable|string',
            ]
        );

        GenIndustry::create([
            'industry_code' => $this->industry_code,
            'industry_name' => $this->industry_name,
            'is_active' => $this->is_active,
            'desc' => $this->desc,
        ]);
        $this->resetFields();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Industry added successfully!');
    }

    public function edit($id)
    {
        $this->getIndustryId = $id;
        $this->resetFields();
        $this->dispatch('show-modal');

        $industry = GenIndustry::findOrFail($this->getIndustryId);
        $this->industry_code = $industry->industry_code;
        $this->industry_name = $industry->industry_name;
        $this->is_active = $industry->is_active;
        $this->desc = $industry->desc;
        $this->isEditMode = true;
    }

    public function update()
    {
        $industry = GenIndustry::findOrFail($this->getIndustryId);
        if ($industry->industry_code != $this->industry_code) {
            $uniqueRule = 'unique:gen_industry,industry_code';
        } else {
            $uniqueRule = '';
        }
        $this->validate(
            [
                'industry_code' => 'required|string|max:50|' . $uniqueRule,
                'industry_name' => 'required|string|max:255',
                'desc' => 'nullable|string',
            ]
        );
        $industry->update([
            'industry_code' => $this->industry_code,
            'industry_name' => $this->industry_name,
            'is_active' => $this->is_active,
            'desc' => $this->desc,
        ]);
        $this->resetFields();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Industry updated successfully!');
    }
    public function deleteConfirmed($id)
    {
        $this->getIndustryId = $id;
        $this->sweetConfirmDelete('Are you sure you want to delete this industry ' . $id . ' ?');
    }
    public function delete()
    {
        GenIndustry::findOrFail($this->getIndustryId)->delete();
        $this->sweetToastSuccess('Industry deleted successfully!');
    }


    public function fetchIndustry()
    {
        return GenIndustry::Search($this->search)->orderBy('id', 'DESC')->paginate(8);
    }

    public function render()
    {

        return view('livewire.industry-skill.industry', [
            'industries' => $this->fetchIndustry(),
        ]);
    }
}
