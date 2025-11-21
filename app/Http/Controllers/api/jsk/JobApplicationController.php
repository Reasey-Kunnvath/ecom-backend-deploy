<?php

namespace App\Http\Controllers\api\jsk;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use App\Services\JobApplicationService;

#[Group('JSK Job Application Management (APPLY, CANCEL)')]
class JobApplicationController extends Controller
{
    protected $jobApplicationService;

    public function __construct(JobApplicationService $jobApplicationService)
    {
        $this->jobApplicationService = $jobApplicationService;
    }

    /**
     * CV Upload
     */
    public function cvUpload(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120', // Max 5MB
        ]);

        $result = $this->jobApplicationService->upload($request);

        return response()->json([
            'message' => 'CV uploaded successfully',
            'cv_path' => $result['path'],
            'cv_url' => $result['url']
        ], 200);
    }

    /**
     * Check if the user is eligible for Easy Apply
     */
    public function checkEasyApplyEligibility(Request $request)
    {
        $result = $this->jobApplicationService->ProfileRating($request);
        return response()->json([
            'message' => $result['message'],
            'data' => $result['data'] ?? null
        ], $result['status']);
    }

    /**
     * Get Current Job Seeker Applications
     */
    public function getCurrentApplications(Request $request)
    {
        $result = $this->jobApplicationService->getCurrentApplications($request);

        return response()->json([
            'message' => $result['message'],
            'data' => $result['data'] ?? null
        ], $result['status']);
    }

    /**
     * Apply for a job
     */
    public function applyJob(Request $request)
    {
        $request->validate([
            'job_posting_id' => 'required|integer|exists:job_postings,id',
            'application_type' => 'required|string|in:CV_UPL,EZ_APY',
            'cv_file' => 'nullable|string',
            'cover_letter' => 'nullable|string'
        ]);

        $result = $this->jobApplicationService->applyJob($request);

        return response()->json([
            'message' => $result['message'],
            'data' => $result['data'] ?? null
        ], $result['status']);
    }

    /**
     * Cancel a job application
     */
    public function cancelApplication(Request $request)
    {
        $request->validate([
            'application_id' => 'required|integer',
            'reason' => 'required|string'
        ]);

        $result = $this->jobApplicationService->cancelApplication($request);
        return response()->json([
            'message' => $result['message'],
            'data' => $result['data'] ?? null
        ], $result['status']);
    }
}
