<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK Education Management (CREATE, UPDATE, DELETE)')]
class JskEducationController extends Controller
{
    /**
     * Store profile education
     */
    public function store(Request $request){
        $validated = $request->validate([
            'data' => 'required|array',
            'data.*.institution_name' => 'required|string|max:255',
            'data.*.degree' => 'required|string|max:255',
            'data.*.fos' => 'nullable|string|max:255',
            'data.*.start_date' => 'required|date',
            'data.*.end_date' => 'nullable|date|after_or_equal:start_year',
            'data.*.description' => 'nullable|string|max:500',
        ]);

        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        User::findOrFail($request->user()->id)->jskProfile->education()->delete();

        $education = $profile->education()->createMany($validated['data']);

        return response()->json([
            'message' => 'Education created successfully',
            'education' => $education
        ]);
    }

    /**
     * Update profile education
     */
    public function update(Request $request, $education_id){
        $validated = $request->validate([
            'institution_name' => 'sometimes|required|string|max:255',
            'degree' => 'sometimes|required|string|max:255',
            'fos' => 'nullable|string|max:255',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'nullable|date|after_or_equal:start_year',
            'description' => 'nullable|string|max:500',
        ]);

        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $education = $profile->education()->find($education_id);
        if (!$education) {
            return response()->json([
                'message' => 'Education not found',
            ], 404);
        }

        $education->update([
            'institution_name' => $validated['institution_name'] ?? $education->institution_name,
            'degree' => $validated['degree'] ?? $education->degree,
            'fos' => $validated['fos'] ?? $education->fos,
            'start_date' => $validated['start_date'] ?? $education->start_date,
            'end_date' => $validated['end_date'] ?? $education->end_date,
            'description' => $validated['description'] ?? $education->description,
        ]);

        return response()->json([
            'message' => 'Education updated successfully',
            'education' => $education
        ]);
    }

    /**
     * Delete profile education
     */
    public function destroy(Request $request, $education_id){
        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $education = $profile->education()->find($education_id);
        if (!$education) {
            return response()->json([
                'message' => 'Education not found',
            ], 404);
        }

        $education->delete();

        return response()->json([
            'message' => 'Education deleted successfully',
        ]);
    }
}