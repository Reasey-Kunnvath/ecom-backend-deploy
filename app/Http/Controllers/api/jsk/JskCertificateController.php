<?php

namespace App\Http\Controllers\api\jsk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK Certificate Management (CREATE, UPDATE, DELETE)')]
class JskCertificateController extends Controller
{
    /**
     * Store Profile Certificate
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.*.certificate_title' => 'required|string|max:255',
            'data.*.issued_org' => 'required|string|max:255',
            'data.*.issued_date' => 'required|date',
            'data.*.description' => 'nullable|string|max:500',
        ]);

        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $profile->certificates()->delete();

        $certificates = $profile->certificates()->createMany($validated['data']);

        return response()->json([
            'message' => 'Certificate created successfully',
            'certificate' => $certificates,
        ]);
    }

    /**
     * Update Profile Certificate
     */
    public function update(Request $request, $certificate_id)
    {
        $validated = $request->validate([
            'certificate_title' => 'sometimes|required|string|max:255',
            'issued_org' => 'sometimes|required|string|max:255',
            'issued_date' => 'sometimes|required|date',
            'description' => 'nullable|string|max:500',
        ]);
        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }
        $certificate = $profile->certificates()->findOrFail($certificate_id);
        $certificate->update($validated);
        return response()->json([
            'message' => 'Certificate updated successfully',
            'certificate' => $certificate,
        ]);
    }

    /**
     * Delete Profile Certificate
     */
    public function destroy(Request $request, $certificate_id)
    {
        $profile = $request->user()->jskProfile;
        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }
        $certificate = $profile->certificates()->findOrFail($certificate_id);
        $certificate->delete();
        return response()->json([
            'message' => 'Certificate deleted successfully',
        ]);
    }
}
