<?php

namespace App\Http\Controllers\api\emp;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('EMP Job Application Management')]
class JobApplicationController extends Controller
{
    /**
     * Get Job Applications
     */
    public function getJobApplications(Request $request){
        $request->validate([
            'status' => 'nullable|string|in:P,S,R,C',
            'job_id' => 'nullable|integer|exists:job_postings,id',
        ]);

        $job_id = $request->job_id;
        $status = $request->status;

        $job_applcation = DB::select('SELECT fn_get_job_application(?, ?, ?) as data', [$request->user()->id, $job_id, $status]);

        if (!$job_applcation[0]->data) {
            return response()->json([
                'message' => 'No job applications found'
            ], 404);
        }

        return response()->json([
            'message' => 'Application Activities retrieved successfully',
            'application_count' => count(json_decode($job_applcation[0]->data, true)),
            'data' => json_decode($job_applcation[0]->data, true),
        ]);
    }

    /**
     * Update Job Application Status
     */
    public function updateJobApplicationStatus(Request $request){
        $request->validate([
            'application_id' => 'required|integer|exists:job_applications,id',
            'status' => 'required|string|in:P,S,R,C',
        ]);

        $application = JobApplication::find($request->application_id);

        $application->application_status = $request->status;
        $application->save();

        return response()->json([
            'message' => 'Application status updated successfully'
        ]);
    }
}