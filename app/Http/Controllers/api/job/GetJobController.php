<?php

namespace App\Http\Controllers\api\job;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Dedoc\Scramble\Attributes\Group;

#[Group('JOB Get')]
class GetJobController extends Controller
{
    /**
     * Get All Jobs
     */
    public function index(Request $request) {
        $jobs = DB::select('SELECT fn_get_job(?, ?) as data', [null, true]);

        return response()->json([
            'message' => 'Jobs retrieved successfully',
            'job_count' => count(json_decode($jobs[0]->data, true)),
            'data' => json_decode($jobs[0]->data, true),
        ]);
    }

    /**
     * Get Specific Job (Search by job_id)
     */
    public function show(Request $request, $job_id) {
        $jobs = DB::selectOne('SELECT fn_get_job(?, ?) as data', [$job_id, true]);

        return response()->json([
            'message' => 'Job retrieved successfully',
            'job_count' => count(json_decode($jobs->data, true)),
            'data' => json_decode($jobs->data, true),
        ]);
    }

    /**
     * Get Specific Job (Search by job title)
     */
    public function searchByTitle(Request $request){
        $jobs_title = $request->title;
        if (!$jobs_title) {
            return response()->json([
                'message' => 'Title query parameter is required',
            ], 400);
        }

        $jobs = JobPosting::where(DB::raw('UPPER(job_title)'), 'LIKE', '%' . strtoupper($jobs_title) . '%')->where('is_active', true)->get();
        foreach ($jobs as $job){
            $data = DB::selectOne('SELECT fn_get_job(?, ?) as data', [$job->id, true]);
        }

        return response()->json([
            'message' => 'Jobs retrieved successfully',
            'job_count' => count(json_decode($data->data, true)),
            'data' => json_decode($data->data, true),
        ]);
    }

    /**
     * Get Employer's Job Posting History
     */
    public function getEmployerHiringHistory(Request $request){
        $jobs = JobPosting::where('maker_id', $request->user()->id)->get();
        $result = [];
        foreach ($jobs as $job){
            $data = DB::selectOne('SELECT fn_get_job(?, ?) as data', [$job->id, null]);
            $result[] = json_decode($data->data, true)[0];
        }

        return response()->json([
            'message' => 'Hiring history retrieved successfully',
            'job_count' => count($result),
            'data' => $result,
        ]);
    }
}