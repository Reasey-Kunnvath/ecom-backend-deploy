<?php

namespace App\Http\Controllers\api\emp;

use App\Models\EmpProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('EMP GET Profile')]
class EmpProfileController extends Controller
{
    /**
     * Get All Emp profile
     */
    public function index(Request $request)
    {
        $profile = DB::select('SELECT fn_get_emp_profile_data() as data');

        return response()->json([
            'data' => json_decode($profile[0]->data, true),
            'message' => 'User profile retrieved successfully',
        ]);
    }

    /**
     * Get current Emp profile
     */
    public function getCurrentUserProfile(Request $request)
    {
        $id = $request->user()->id;

        $profile = DB::select('SELECT fn_get_emp_profile_data(?) as data', [$id]);

        if (!$profile || !$profile[0]->data) {
            return response()->json([
                'message' => 'Profile not found',
                'success' => false
            ], 404);
        }

        return response()->json([
            'data' => json_decode($profile[0]->data, true),
            'message' => 'User profile retrieved successfully',
        ]);
    }

    /**
     * Get Specific Emp profile (Search by user_id)
     */
    public function show(Request $request, $user_id)
    {
        $profile = DB::select('SELECT fn_get_emp_profile_data(?) as data', [$user_id]);

        if (!$profile || !$profile[0]->data) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        return response()->json([
            'data' => json_decode($profile[0]->data, true),
            'message' => 'User profile retrieved successfully',
        ]);
    }

    /**
     * Get Specific Emp profile (Search by name)
     */
    public function searchByName(Request $request)
    {
        $name = $request->name;
        if (!$name) {
            return response()->json([
                'message' => 'Name query parameter is required',
            ], 400);
        }

        $profiles = EmpProfile::where(DB::raw('UPPER(company_name)'), 'LIKE', strtoupper($name) . '%')
            ->get();

        foreach ($profiles as $profile) {
            $data = DB::selectOne('SELECT fn_get_emp_profile_data(?) as data', [$profile->user_id]);
        }

        if (empty($data)) {
            return response()->json([
                'message' => 'Employer profile not found',
            ], 404);
        }

        return response()->json([
            'data' => json_decode($data->data, true),
            'message' => 'Employer profile retrieved successfully',
        ]);
    }
}
