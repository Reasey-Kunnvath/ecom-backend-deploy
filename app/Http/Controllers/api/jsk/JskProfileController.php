<?php

namespace App\Http\Controllers\api\jsk;

use App\Models\User;
use App\Models\JskSkill;
use App\Models\JskProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('JSK GET Profiles')]
class JskProfileController extends Controller
{
    /**
     * Get all profiles
     */
    public function index(Request $request)
    {
        $profiles = DB::select('SELECT fn_get_profile_data(?) as data', [null]);

        return response()->json([
            'data' => json_decode($profiles[0]->data, true),
            'message' => 'Profiles retrieved successfully',
        ]);
    }

    /**
     * Get current user's profile
     */
    public function getCurrentUserProfile(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        $profile = DB::selectOne('SELECT fn_get_profile_data(?) as data', [$id]);

        $data = json_decode($profile->data, true);

        if (!empty($data['profile_img'])) {
            $data['profile_img'] = asset('storage/' . $data['profile_img']);
        }

        return response()->json([
            'data' => $data,
            'message' => 'User profile retrieved successfully',
        ]);
    }


    /**
     * Get specific user's profile (Search by user_id)
     */
    public function show(Request $request, $user_id)
    {
        $profile = DB::selectOne('SELECT fn_get_profile_data(?) as data', [$user_id]);

        $data = json_decode($profile->data, true);

        if (!empty($data['profile_img'])) {
            $data['profile_img'] = asset('storage/' . $data['profile_img']);
        }

        return response()->json([
            'data' => $data,
            'message' => 'User profile retrieved successfully',
        ]);
    }

    /**
     * Get specific user's profile (Search by name)
     */
    public function searchByName(Request $request)
    {
        $name = $request->name;
        if (!$name) {
            return response()->json([
                'message' => 'Name query parameter is required',
            ], 400);
        }

        $profiles = JskProfile::where(DB::raw('UPPER(first_name)'), 'LIKE', strtoupper($name) . '%')
            ->orWhere(DB::raw('UPPER(last_name)'), 'LIKE', '%' . strtoupper($name) . '%')
            ->get();

        foreach ($profiles as $profile) {
            $data = DB::selectOne('SELECT fn_get_profile_data(?) as data', [$profile->user_id]);
        }

        if (empty($data)) {
            return response()->json([
                'message' => 'User profile not found',
            ], 404);
        }

        return response()->json([
            'data' => $data ? json_decode($data->data, true) : null,
            'message' => 'User profile retrieved successfully',
        ]);
    }
}
