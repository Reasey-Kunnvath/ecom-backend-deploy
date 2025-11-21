<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\JskProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JskProfileExperience;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK Experience Management (CREATE, UPDATE, DELETE)')]
class ProfileExpController extends Controller
{
    /**
     * Store profile experience
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.*.job_title' => 'required|string|max:255',
            'data.*.company_name' => 'required|string|max:255',
            'data.*.company_address' => 'required|string|max:255',
            'data.*.description' => 'nullable|string|max:500',
            'data.*.start_date' => 'required|date',
            'data.*.end_date' => 'nullable|date',
        ]);

        // $profileID = JskProfile::where('user_id', $request->user()->id)->first()->id;

        $profileID = request()->user()->jskProfile;
        if (!$profileID) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $profileID->experience()->delete();

        $experiences = $profileID->experience()->createMany($validated['data']);

        return response()->json([
            'data' => $experiences,
            'message' => 'User profile experience created successfully',
        ]);
    }

    /**
     * Update profile experience
     */
    public function update(Request $request, $experience_id) {
        $profile = request()->user()->jskProfile;

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $experience = JskProfileExperience::where('id', $experience_id)->where('profile_id', $profile->id)->first();

        if (!$experience) {
            return response()->json([
                'message' => 'Experience not found',
            ], 404);
        }

        $validated = $request->validate([
            'data' => 'required|array',
            'data.*.job_title' => 'required|string|max:255',
            'data.*.company_name' => 'required|string|max:255',
            'data.*.company_address' => 'required|string|max:255',
            'data.*.description' => 'nullable|string|max:500',
            'data.*.start_date' => 'required|date',
            'data.*.end_date' => 'nullable|date',
        ]);

        $experience->update($validated);

        return response()->json([
            'data' => $experience,
            'message' => 'User profile experience updated successfully',
        ]);
    }

    /**
     * Delete profile experience
     */
    public function destroy(Request $request, $id) {
        $profile = JskProfile::where('user_id', $request->user()->id)->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $experience = JskProfileExperience::where('id', $id)->where('profile_id', $profile->id)->first();

        if (!$experience) {
            return response()->json([
                'message' => 'Experience not found',
            ], 404);
        }

        $experience->delete();

        return response()->json([
            'message' => 'User profile experience deleted successfully',
        ], 200);
    }
}