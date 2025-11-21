<?php

namespace App\Livewire\JobApplication;

use App\Models\JobApplication;
use App\Trait\HasNotification;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

#[Title('Job Application Module')]
class JobApplicationController extends Component
{
    use HasNotification, WithPagination, WithFileUploads;
    public $search = '';
    public $isEditMode = false, $isViewMode = false;
    public $getAppid;
    public $application_date, $application_status, $job_posting_id, $job_posting_title, $applicant_id, $application_type, $cv_path, $cover_letter, $reason, $created_at, $updated_at;

    public function view_modal($id)
    {
        $this->isViewMode = true;
        $this->isEditMode = false;
        $this->dispatch('show-modal');
        $this->getAppid = $id;
        $application = JobApplication::findOrFail($this->getAppid);
        $this->application_date = $application->application_date;
        $this->application_status = $application->application_status;
        $this->job_posting_id = sprintf('%06d', $application->job_posting_id);
        $this->job_posting_title = $application->jobPosting->job_title;
        $this->applicant_id = $application->applicant_id;
        $this->application_type = $application->application_type;
        $this->cv_path = $application->cv_path;
        $this->cover_letter = $application->cover_letter;
        $this->reason = $application->reason;
        $this->created_at = $application->created_at->format('Y-m-d');
        $this->updated_at = $application->updated_at->format('Y-m-d');


        // dd($this->application_date, $this->application_status, $this->job_posting_id, $this->job_posting_title, $this->applicant_id, $this->application_type, $this->cv_path, $this->cover_letter, $this->reason, $this->created_at, $this->updated_at);
    }
    public function fetchJobApplications()
    {
        return JobApplication::orderBy('id', 'desc')->paginate(8);
        // return JobApplication::Search($this->search)->orderBy('id', 'desc')->paginate(8);
    }
    public function render()
    {
        return view('livewire.job-application.job-application', [
            'applications' => $this->fetchJobApplications()
        ]);
    }
}
