<?php

namespace App\Http\Controllers\api\emp;

use App\Models\EmpProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('EMP Profile Info Management (CREATE, UPDATE, DELETE)')]
class ProfileInfoController extends Controller
{
    /**
     *  Store Profile Information
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_size' => 'required|string|max:100',
            'industry' => 'required|string|max:100',
            'hq_address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_img' => 'nullable|string',
        ]);

        $user = $request->user();

        if ($user->empProfile) {
            return response()->json([
                'message' => 'Profile already exists'
            ], 400);
        }

        $profile = $user->empProfile()->create([
            'company_name' => $request->company_name,
            'company_size' => $request->company_size,
            'industry' => $request->industry,
            'hq_address' => $request->hq_address,
            'description' => $request->description,
            'company_img' => $request->company_img,
        ]);

        return response()->json([
            'message' => 'Profile created successfully',
            'profile' => $profile
        ], 201);
    }

    /**
     *  Update Profile Information
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'company_name' => 'sometimes|required|string|max:255',
            'company_size' => 'sometimes|required|string|max:100',
            'industry' => 'sometimes|required|string|max:100',
            'hq_address' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'company_img' => 'nullable|string',
        ]);

        $user = $request->user();

        if (!$user->empProfile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile = $user->empProfile()->update($validate);

        return response()->json([
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ], 200);
    }

    /**
     *  Delete Profile Information
     */
    public function destroy(Request $request, $emp_profile_id)
    {
        $user = $request->user();

        if (!$user->empProfile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $user->empProfile()->delete();

        return response()->json([
            'message' => 'Profile deleted successfully'
        ], 200);
    }

    /**
     * Testing
     */
    public function testing(Request $request)
    {
        return response()->json($request->user()->empProfile);
    }
}
