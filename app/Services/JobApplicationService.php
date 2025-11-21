<?php
namespace App\Services;

use App\Models\JskProfile;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class JobApplicationService
{
    public function ProfileRating(Request $request)
    {

        $user = $request->user();

        $getPfScore = DB::select('SELECT fn_get_profile_rating(?) as score', [$user->id]);
        $pfScore = json_decode($getPfScore[0]->score, true);

        if(!$pfScore['ez_apply_eligibility']){
            return [
                'status' => 200,
                'message' => 'User is not eligible for Easy Apply',
                'data' => $pfScore
            ];
        }

        return [
            'status' => 200,
            'message' => 'This User is eligible for Easy Apply',
            'data' => $pfScore
        ];
    }

    public function upload (Request $request)
    {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120',
        ]);

        $path = $request->file('cv_file')->store('cvs', 'public');

        if(!$path){
            throw ValidationException::withMessages([
                'cv_file' => 'Failed to upload CV file'
            ]);
        }

        return [
            'path' => $path,
            'url' => asset('storage/' . $path)
        ];
    }

    public function applyJob(Request $request)
    {
        $validated = $request->validate([
            'job_posting_id' => 'required|integer|exists:job_postings,id',
            'application_type' => 'required|string|in:CV_UPL,EZ_APY',
            'cv_file' => 'nullable|string',
            'cover_letter' => 'nullable|string'
        ]);

        $user = $request->user();

        $profile = JskProfile::where('user_id', $user->id)->first();
        if (!$profile) {
            return [
                'status' => 400,
                'message' => 'Job Seeker profile not found. Please complete your profile before applying.'
            ];
        }

        if($request->cv_file && $validated['application_type'] === 'EZ_APY'){
            return [
                'status' => 400,
                'message' => 'CV file should not be provided for Easy Apply applications'
            ];
        }elseif(!$request->cv_file && $validated['application_type'] === 'CV_UPL'){
            return [
                'status' => 400,
                'message' => 'CV file is required for CV Upload applications'
            ];
        }

        $existing = JobApplication::where('job_posting_id', $validated['job_posting_id'])
            ->where('applicant_id', $user->id)->whereIn('application_status', ['P', 'S'])
            ->first();

        if ($existing) {
            if ($existing->application_status === 'P') {
                return [
                    'status' => 409,
                    'message' => 'You have already applied for this job and your application is still pending.',
                    'data' => $existing
                ];
            }

            if ($existing->application_status === 'S') {
                return [
                    'status' => 409,
                    'message' => 'Your Application has been shortlisted. Look out for a notification from the company!',
                    'data' => $existing
                ];
            }
        }

        // Create new application
        $application = JobApplication::create([
            'application_date' => now(),
            'application_status' => 'P',
            'job_posting_id' => $validated['job_posting_id'],
            'applicant_id' => $user->id,
            'application_type' => $validated['application_type'],
            'cv_path' => $validated['application_type'] === 'CV_UPL' ? $validated['cv_file'] : null,
            'cover_letter' => $validated['cover_letter'] ?? null
        ]);

        return [
            'status' => 200,
            'message' => 'Job application submitted successfully',
            'data' => $application
        ];
    }

    public function getCurrentApplications(Request $request)
    {
        $user = $request->user();

        $applications = DB::select('SELECT fn_get_application(?, ?) as data', [$user->id, null]);

        if (!$applications[0]->data) {
            return [
                'status' => 404,
                'message' => 'No current job applications found for this user'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Job applications retrieved successfully',
            'data' => json_decode($applications[0]->data, true)
        ];
    }

    public function cancelApplication(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required|integer',
            'reason' => 'required|string'
        ]);

        $application = JobApplication::find($validated['application_id']);
        $user = $request->user();

        if (!$application) {
            return ['status' => 404, 'message' => 'Job application not found'];
        }

        if ($application->applicant_id !== $user->id) {
            return ['status' => 403, 'message' => 'You are not authorized to cancel this application'];
        }

        if ($application->application_status === 'C') {
            return ['status' => 409, 'message' => 'This application has already been cancelled'];
        }

        $application->update([
            'application_status' => 'C',
            'reason' => $validated['reason']
        ]);

        return [
            'status' => 200,
            'message' => 'Job application cancelled successfully',
            'data' => $application
        ];
    }
}