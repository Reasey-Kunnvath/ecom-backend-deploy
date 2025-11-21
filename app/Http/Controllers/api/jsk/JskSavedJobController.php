<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\JskSavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK Saved Jobs')]
class JskSavedJobController extends Controller
{
    /**
     * Get all saved jobs for a job seeker.
     */
    public function getAllSavedJobs(Request $request){
        $savedJobs = JskSavedJob::where('jsk_user_id', $request->user()->id)->pluck('job_id');

        if ($savedJobs->isEmpty()) {
            return response()->json([
                'message' => 'Saved jobs not found'
            ], 404);
        }

        $jobsData = [];

        foreach ($savedJobs as $jobId) {
            $result = DB::selectOne('SELECT fn_get_job(?) as data', [$jobId]);

            if ($result && $result->data) {
                $jobsData[] = json_decode($result->data, true);
            }
        }

        return response()->json([
            'data' => $jobsData,
            'message' => 'Saved jobs retrieved successfully'
        ], 200);
    }

    /**
     * Store saved job for a job seeker.
     */
    public function storedSavedJob(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job_postings,id',
        ]);

        $jobExists = JskSavedJob::where('job_id', $request->job_id)
            ->where('jsk_user_id', $request->user()->id)
            ->first();

        if ($jobExists) {
            return response()->json([
                'message' => 'Job already saved',
                'data' => $jobExists
            ], 200);
        }

        $savedJob = new JskSavedJob();
        $savedJob->job_id = $request->job_id;
        $savedJob->jsk_user_id = $request->user()->id;
        $savedJob->saved_date = now();
        $savedJob->save();

        return response()->json([
            'message' => 'Job saved successfully',
            'data' => $savedJob
        ], 201);
    }

    /**
     * Delete saved job for a job seeker.
     */
    public function deleteSavedJob(Request $request){
        $request->validate([
            'job_id' => 'required|exists:job_postings,id',
        ]);

        $savedJob = JskSavedJob::where('job_id', $request->job_id)
            ->where('jsk_user_id', $request->user()->id)
            ->first();

        if (!$savedJob) {
            return response()->json([
                'message' => 'Saved job not found'
            ], 404);
        }

        $savedJob->delete();

        return response()->json([
            'message' => 'Saved job deleted successfully'
        ], 200);
    }
}