<?php

namespace App\Http\Controllers\api\emp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dedoc\Scramble\Attributes\Group;
use App\Models\EmpBizVer;
use App\Models\EmpProfile;

#[Group('EMP Biz Verification Management')]
class BizVerController extends Controller
{
    /**
     * Create Biz verification
     */
    public function store(Request $request)
    {
        // Logic to store business verification details
        $request->validate([
            'biz_reg_no' => 'required|string|max:20',
            'biz_license_img' => 'nullable|string|max:500',
        ]);
        $user = $request->user();

        // Check if the user is authenticated and has an associated profile
        if (!$user || !$user->empProfile) {
            return response()->json([
                'message' => 'Employee profile not found. Please create an employee profile first.'
            ], 404);
        }
        // Check if a business verification already exists for this profile
        $empBizVer = EmpBizVer::where('profile_id', $user->empProfile->id)->first();
        if ($empBizVer) {
            return response()->json([
                'message' => 'Business verification already exists',
                'verification' => $empBizVer
            ], 409);
        }

        // Create a new business verification record
        $biz_verification = EmpBizVer::create([
            'biz_reg_no' => $request->biz_reg_no,
            'biz_license_img' => $request->biz_license_img,
            'profile_id' => $user->empProfile->id
        ]);

        return response()->json([
            'message' => 'Business verification created successfully',
            'verification' => $biz_verification
        ], 200);
    }
    /**
     * Update Biz verification
     */
    public function update(Request $request, $id)
    {
        // Logic to update business verification details
        $request->validate([
            'biz_reg_no' => 'sometimes|required|string|max:20',
            'biz_license_img' => 'nullable|string|max:500',
        ]);

        $user = $request->user();

        // Find the existing business verification record
        $biz_verification = EmpBizVer::find($id);
        if (!$biz_verification) {
            return response()->json([
                'message' => 'Business verification not found'
            ], 404);
        }

        // Update the business verification record
        $biz_verification = EmpBizVer::where('id', $id)->update([
            'biz_reg_no' => $request->biz_reg_no,
            'biz_license_img' => $request->biz_license_img,
            'profile_id' => $user->empProfile->id
        ]);

        return response()->json([
            'message' => 'Business verification updated successfully',
            'verification' => $biz_verification
        ], 200);
    }
    /**
     * Delete Biz verification
     */
    public function destroy($id)
    {
        // Logic to delete business verification details
        $biz_verification = EmpBizVer::find($id);

        if (!$biz_verification) {
            return response()->json([
                'message' => 'Business verification not found'
            ], 404);
        }

        $biz_verification->delete();

        return response()->json([
            'message' => 'Business verification deleted successfully'
        ], 200);
    }
}
