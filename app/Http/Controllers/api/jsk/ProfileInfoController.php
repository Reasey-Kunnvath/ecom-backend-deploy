<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\User;
use App\Models\JskProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JskProfileExperience;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Support\Facades\Validator;

#[Group('JSK Information Management (CREATE, UPDATE, DELETE)')]
class ProfileInfoController extends Controller
{
    // /**
    //  * Image Handler
    //  */
    // public function imageUpload(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'profile_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => 'Invalid image file',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $path = $request->file('profile_img')->store('profile_images', 'public');

    //     return response()->json([
    //         'message' => 'Image uploaded successfully',
    //         'path' => $path,
    //     ]);
    // }

    /**
     * Store profile information
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'work_email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'profile_desc' => 'nullable|string|max:500',
            'profile_img' => 'nullable|string|max:500',
        ]);

        if (JskProfile::where('user_id', $request->user()->id)->exists()) {
            return response()->json(
                [
                    'message' => 'User profile already exists',
                ],
                409,
            );
        }

        $profile = JskProfile::create([
            'user_id' => $request->user()->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'work_email' => $validated['work_email'],
            'phone_number' => $validated['phone_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'profile_desc' => $validated['profile_desc'],
            'profile_img' => $validated['profile_img'],
        ]);

        return response()->json(
            [
                'data' => $profile,
                'message' => 'User profile created successfully',
            ],
            201,
        );
    }

    /**
     * Edit profile information
     */
    public function update(Request $request, $profile_id)
    {
        $profile = JskProfile::where('user_id', $request->user()->id)
            ->where('id', $profile_id)
            ->first();

        if (!$profile) {
            return response()->json(
                [
                    'message' => 'Profile not found',
                ],
                404,
            );
        }

        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'work_email' => 'sometimes|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'profile_desc' => 'nullable|string|max:500',
            'profile_img' => 'nullable|string|max:500',
        ]);

        $profile->update($validated);

        return response()->json([
            'data' => $profile,
            'message' => 'User profile updated successfully',
        ]);
    }

    /**
     * Delete specific user profile
     */
    public function destroy(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id);
        if (!$user) {
            return response()->json(
                [
                    'message' => 'Profile not found',
                ],
                404,
            );
        }

        $user->delete();

        return response()->json(
            [
                'message' => 'User profile deleted successfully',
            ],
            200,
        );
    }
}
