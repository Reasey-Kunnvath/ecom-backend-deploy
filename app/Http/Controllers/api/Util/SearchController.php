<?php

namespace App\Http\Controllers\api\Util;

use App\Models\User;
use App\Models\EmpProfile;
use App\Models\JskProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('Common')]
class SearchController extends Controller
{
    /**
     * Search User
     */
    public function searchUser(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $search = $request->get('search');

        // Search Job Seekers
        $jobSeekers = JskProfile::where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->get()
            ->map(function ($item) {
                $item->type = 'JSK';
                return $item;
            });

        // Search Employers
        $employers = EmpProfile::where('company_name', 'like', "%{$search}%")
            ->get()
            ->map(function ($item) {
                $item->type = 'EMP';
                return $item;
            });

        // Merge both collections
        $results = $jobSeekers->merge($employers)->values();

        return response()->json([
            'message' => 'Combined users retrieved successfully',
            'data' => $results
        ]);
    }

}