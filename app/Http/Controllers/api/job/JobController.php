<?php

namespace App\Http\Controllers\api\job;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use App\Http\Controllers\api\emp\EmpProfileController;


#[Group('EMP JOB Management (CREATE, UPDATE, DELETE)')]
class JobController extends Controller
{

    /**
     * Create a new job
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_desc' => 'required|string',
            'responsibilities' => 'required|array',
            'req_experience' => 'required|array',
            'req_education' => 'required|array',
            'req_certificate' => 'required|array',
            'req_skill' => 'nullable|array',
            'req_skill.*' => 'exists:jsk_skills,id',
            'job_type' => 'required|string|max:255',
            'work_mode' => 'required|string|max:255',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric|gte:min_salary',
            'ccy' => ['required', Rule::in(['USD', 'KHR'])],
            'job_location' => 'required|string|max:255',
            'expire_date' => 'required|date|after:today',
        ]);

        $profile = DB::select('SELECT fn_get_emp_profile_data(?) as data', [$request->user()->id]);

        if (!$profile || !$profile[0]->data) {
            return response()->json([
                'message' => 'Please create your profile to post a job',
                'success' => false
            ], 404);
        }

        $job = JobPosting::create([
            'job_title' => $validated['job_title'],
            'job_desc' => $validated['job_desc'],
            'responsibilities' => $validated['responsibilities'],
            'req_experience' => $validated['req_experience'],
            'req_education' => $validated['req_education'],
            'req_certificate' => $validated['req_certificate'],
            'job_type' => $validated['job_type'],
            'work_mode' => $validated['work_mode'],
            'min_salary' => $validated['min_salary'],
            'max_salary' => $validated['max_salary'],
            'ccy' => $validated['ccy'],
            'job_location' => $validated['job_location'],
            'is_active' => false,
            'posted_date' => now(),
            'expire_date' => $validated['expire_date'],
            'maker_id' => $request->user()->id,
        ]);

        $job->skills()->attach($validated['req_skill']);

        return response()->json([
            'message' => 'Job created successfully',
            'job'     => $job->load('skills')
        ], 201);
    }

    /**
     * Update a job
     */
    public function update(Request $request, JobPosting $job)
    {
        $validated = $request->validate([
            'job_title' => 'sometimes|required|string|max:255',
            'job_desc' => 'sometimes|required|array',
            'responsibilities' => 'sometimes|required|array',
            'req_experience' => 'sometimes|required|array',
            'req_education' => 'sometimes|required|array',
            'req_certificate' => 'sometimes|required|array',
            'req_skill' => 'nullable|array',
            'req_skill.*' => 'exists:jsk_skills,id',
            'job_type' => 'sometimes|required|string|max:255',
            'work_mode' => 'sometimes|required|string|max:255',
            'min_salary' => 'sometimes|required|numeric',
            'max_salary' => 'sometimes|required|numeric|gte:min_salary',
            'ccy' => ['sometimes', 'required', Rule::in(['USD', 'KHR'])],
            'job_location' => 'sometimes|required|string|max:255',
            'expire_date' => 'sometimes|required|date|after:today',
        ]);

        $job->update($validated);

        if (array_key_exists('req_skill', $validated)) {
            $job->skills()->sync($validated['req_skill'] ?? []);
        }

        return response()->json([
            'message' => 'Job updated successfully',
            'job'     => $job->load('skills')
        ], 200);
    }

    /**
     * Delete a job
     */
    public function destroy(JobPosting $job)
    {
        $job->skills()->detach();

        $job->delete();

        return response()->json([
            'message' => 'Job deleted successfully',
        ], 200);
    }

    /**
     * Deactivate a job based on User ID
     */
    public function jobActivation(string $userId, bool $activate){
        $jobs = JobPosting::where('maker_id', $userId)->whereColumn('posted_date', '!=', 'expire_date')->get();

        foreach ($jobs as $job) {
            $job->is_active = $activate;
            $job->save();
        }

        return response()->json([
            'message' => 'Jobs deactivated successfully for user ID: ' . $userId,
        ], 200);
    }
}