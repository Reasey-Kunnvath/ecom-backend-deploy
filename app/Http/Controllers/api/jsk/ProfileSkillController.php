<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\GenIndustry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK Skills Management (CREATE)')]
class ProfileSkillController extends Controller
{
    /**
     * Store profile skills
     */
    public function store(Request $request){
        $validated = $request->validate([
            'skill_id'   => 'nullable|array',
            'skill_id.*' => 'exists:jsk_skills,id',
        ]);

        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $profile->skills()->sync($validated['skill_id']);

        return response()->json([
            'message' => 'User profile skills updated successfully',
        ], 200);
    }

    /**
     * Get Industries
     */
    public function getIndustries(Request $request){
        $industries = GenIndustry::all();

        return response()->json([
            'message' => 'Industries retrieved successfully',
            'data' => $industries
        ], 200);
    }
}
