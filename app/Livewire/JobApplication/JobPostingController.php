<?php

namespace App\Livewire\JobApplication;

use App\Models\User;
use Livewire\Component;
use App\Models\JobPosting;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Trait\HasNotification;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

#[Title('Job Posting Module')]
class JobPostingController extends Component
{
    use HasNotification;
    use WithPagination;
    public $isViewMode = false, $isEditMode = false;
    public $addResponsibility = false, $addExperience = false, $addEducation = false, $addCertificate = false;
    public $getPostingId, $postID, $job_title, $job_desc,  $job_type, $work_mode, $min_salary, $max_salary, $ccy, $job_location, $is_active, $maker_id, $created_at, $updated_at, $posted_date, $expire_date;
    public $responsibilities = [''];
    public $req_experience = [''];
    public $req_education = [''];
    public $req_certificate = [''];
    protected $listeners = ['deleteConfirmed' => 'delete'];
    #[Url(history: true)]
    public $search = '';
    protected $rules =
    [
        'job_title' => 'required|string|max:255',
        'job_desc' => 'required|string',
        'job_type' => 'required|string|max:255',
        'work_mode' => 'required|string|max:255',
        'min_salary' => 'required|numeric',
        'max_salary' => 'required|numeric|gte:min_salary',
        'ccy' => 'required',
        'job_location' => 'required|string|max:255',
        'expire_date' => 'required|date|after:today',
        'responsibilities' => 'required|array',
        'responsibilities.*' => 'required|string',
        'req_experience' => 'required|array',
        'req_experience.*' => 'required|string',
        'req_education' => 'nullable|array',
        'req_education.*' => 'nullable|string',
        'req_certificate' => 'nullable|array',
        'req_certificate.*' => 'nullable|string',
    ];

    public function resetTabs()
    {
        $this->addResponsibility = false;
        $this->addExperience = false;
        $this->addEducation = false;
        $this->addCertificate = false;
    }
    public function resetForm()
    {
        $this->reset([
            'postID',
            'job_title',
            'job_desc',
            'job_type',
            'work_mode',
            'min_salary',
            'max_salary',
            'ccy',
            'job_location',
            'is_active',
            'maker_id',
            'created_at',
            'updated_at',
            'posted_date',
            'expire_date',
            'responsibilities',
            'req_experience',
            'req_education',
            'req_certificate'
        ]);
    }

    public function add_modal()
    {
        $this->resetForm();
        $this->posted_date = now()->format('Y-m-d');
        $this->maker_id = Auth::user()->id;
        $this->isViewMode = false;
        $this->isEditMode = false;
        $this->dispatch('show-modal');
        $this->resetTabs();
    }
    public function store()
    {
        try {
            $this->validate();
        } catch (\throwable $e) {
            $this->sweetToastError($e->getMessage());
            return;
        }
        JobPosting::create([
            'job_title' => $this->job_title,
            'job_desc' => $this->job_desc,
            'job_type' => $this->job_type,
            'work_mode' => $this->work_mode,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'ccy' => $this->ccy,
            'job_location' => $this->job_location,
            'is_active' => $this->is_active,
            'maker_id' => $this->maker_id,
            'expire_date' => $this->expire_date ?? null,
            'posted_date' => $this->posted_date ?? null,
            'req_experience' => $this->req_experience,
            'req_education' => $this->req_education,
            'req_certificate' => $this->req_certificate,
            'responsibilities' => $this->responsibilities
        ]);
        $this->resetForm();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Job posting added successfully!');
    }
    public function addResponsibilities()
    {
        $this->responsibilities[] = '';
        $this->addResponsibility = true;
        $this->addExperience = false;
        $this->addEducation = false;
        $this->addCertificate = false;
    }
    public function removeResponsibilities($index)
    {
        unset($this->responsibilities[$index]);
        $this->responsibilities = array_values($this->responsibilities);
    }
    public function addExperiences()
    {
        $this->req_experience[] = '';
        $this->addExperience = true;
        $this->addResponsibility = false;
        $this->addEducation = false;
        $this->addCertificate = false;
    }
    public function removeExperiences($index)
    {
        unset($this->req_experience[$index]);
        $this->req_experience = array_values($this->req_experience);
    }
    public function addEducations()
    {
        $this->req_education[] = '';
        $this->addEducation = true;
        $this->addExperience = false;
        $this->addResponsibility = false;
        $this->addCertificate = false;
    }
    public function removeEducations($index)
    {
        unset($this->req_education[$index]);
        $this->req_education = array_values($this->req_education);
    }
    public function addCertificates()
    {
        $this->req_certificate[] = '';
        $this->addCertificate = true;
        $this->addEducation = false;
        $this->addExperience = false;
        $this->addResponsibility = false;
    }
    public function removeCertificates($index)
    {
        unset($this->req_certificate[$index]);
        $this->req_certificate = array_values($this->req_certificate);
    }

    public function edit_modal($id)
    {
        $this->resetForm();
        $this->resetTabs();
        $this->isViewMode = false;
        $this->isEditMode = true;
        $this->getPostingId = $id;
        $this->dispatch('show-modal');
        $jobposting = $this->fetchPosting()->where('id', $this->getPostingId)->first();
        $this->postID = $jobposting->id;
        $this->job_title = $jobposting->job_title;
        $this->job_desc = $jobposting->job_desc;
        $this->responsibilities = $jobposting->responsibilities;
        $this->req_experience = $jobposting->req_experience;
        $this->req_education = $jobposting->req_education;
        $this->req_certificate = $jobposting->req_certificate;
        $this->job_type = $jobposting->job_type;
        $this->work_mode = $jobposting->work_mode;
        $this->min_salary = $jobposting->min_salary;
        $this->max_salary = $jobposting->max_salary;
        $this->ccy = $jobposting->ccy;
        $this->job_location = $jobposting->job_location;
        $this->is_active = $jobposting->is_active;
        $this->maker_id = $jobposting->maker_id;
        $this->created_at = date('Y-m-d', strtotime($jobposting->created_at));
        $this->updated_at = date('Y-m-d', strtotime($jobposting->updated_at));
        $this->posted_date = $jobposting->posted_date;
        $this->expire_date = $jobposting->expire_date;
    }
    public function update()
    {
        try {
            $this->validate();
        } catch (\throwable $e) {
            $this->sweetToastError($e->getMessage());
            return;
        }
        // dd(
        //     $this->postID,
        //     $this->job_title,
        //     $this->job_type,
        //     $this->job_desc,
        //     $this->work_mode,
        //     $this->min_salary,
        //     $this->max_salary,
        //     $this->ccy,
        //     $this->job_location,
        //     $this->is_active,
        //     $this->posted_date,
        //     $this->expire_date,
        //     $this->req_experience,
        //     $this->req_education,
        //     $this->req_certificate,
        //     $this->responsibilities
        // );
        JobPosting::where('id', $this->postID)->update([
            'job_title' => $this->job_title,
            'job_desc' => $this->job_desc,
            'job_type' => $this->job_type,
            'work_mode' => $this->work_mode,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'ccy' => $this->ccy,
            'job_location' => $this->job_location,
            'is_active' => $this->is_active,
            'expire_date' => $this->expire_date ?? null,
            'posted_date' => $this->posted_date ?? null,
            'req_experience' => $this->req_experience,
            'req_education' => $this->req_education,
            'req_certificate' => $this->req_certificate,
            'responsibilities' => $this->responsibilities
        ]);
        $this->resetForm();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Job posting updated successfully!');
    }

    public function view_modal($id)
    {
        $this->resetTabs();
        $this->isViewMode = true;
        $this->getPostingId = $id;
        $this->dispatch('show-modal');
        $jobposting = $this->fetchPosting()->where('id', $this->getPostingId)->first();
        $this->postID = $jobposting->id;
        $this->job_title = $jobposting->job_title;
        $this->job_desc = $jobposting->job_desc;
        $this->responsibilities = $jobposting->responsibilities;
        $this->req_experience = $jobposting->req_experience;
        $this->req_education = $jobposting->req_education;
        $this->req_certificate = $jobposting->req_certificate;
        $this->job_type = $jobposting->job_type;
        $this->work_mode = $jobposting->work_mode;
        $this->min_salary = $jobposting->min_salary;
        $this->max_salary = $jobposting->max_salary;
        $this->ccy = $jobposting->ccy;
        $this->job_location = $jobposting->job_location;
        $this->is_active = $jobposting->is_active;
        $this->posted_date = $jobposting->posted_date;
        $this->expire_date = $jobposting->expire_date;
        $this->maker_id = $jobposting->user->name;
        $this->created_at = date('Y-m-d', strtotime($jobposting->created_at));
        $this->updated_at = date('Y-m-d', strtotime($jobposting->updated_at));
        // dd($this->posted_date, $this->expire_date);
    }
    public function deleteConfirmed($id)
    {
        $this->getPostingId = $id;
        $this->sweetConfirmDelete('Are you sure you want to delete this skill ' . $id . ' ?');
    }
    public function delete()
    {
        JobPosting::where('id', $this->getPostingId)->delete();
        $this->resetForm();
        $this->dispatch('close-modal');
        $this->sweetToastSuccess('Job posting deleted successfully!');
    }
    public function fetchPosting()
    {
        return JobPosting::Search($this->search)->orderBy('id', 'desc')->paginate(8);
    }
    public function fetchUser()
    {
        return User::get();
    }
    public function render()
    {
        return view('livewire.job-application.job-posting', [
            'postings' => $this->fetchPosting(),
            'users' => $this->fetchUser()
        ]);
    }
}
