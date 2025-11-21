<?php

namespace App\Http\Controllers\api\emp;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
    EmpAccRep
};

use Illuminate\Http\Request;
use Dedoc\Scramble\Attributes\Group;

#[Group('EMP Account Representative Management')]
class AccRepController extends Controller
{
    /**
     * Create Account Representative
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|min:8'
        ]);
        $user = $request->user();

        $empaccrep = EmpAccRep::where('profile_id', $user->empProfile->id)->first();

        if ($empaccrep) {
            return response()->json([
                'message' => 'Account Representative already exists',
                'user' => $empaccrep
            ], 409);
        }

        $empaccrep = EmpAccRep::create([
            'full_name' => $request->full_name,
            'job_title' => $request->job_title,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'profile_id' => $user->empProfile->id
        ]);

        return response()->json([
            'message' => 'Account Representative created successfully',
            'user' => $empaccrep
        ], 200);
    }
    /**
     * Update Account Representative
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'job_title' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'phone_number' => 'sometimes|required|string|min:8'
        ]);

        $empaccrep = EmpAccRep::find($id);
        if (!$empaccrep) {
            return response()->json([
                'message' => 'Account Representative not found'
            ], 404);
        }
        $user = $request->user();

        $empaccrep = EmpAccRep::where('id', $id)->update([
            'full_name' => $request->full_name,
            'job_title' => $request->job_title,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'profile_id' => $user->empProfile->id
        ]);

        return response()->json([
            'message' => 'Account Representative updated successfully',
            'user' => $empaccrep
        ], 200);
    }
    /**
     * Delete Account Representative
     */
    public function destroy($id)
    {
        $empaccrep = EmpAccRep::find($id);
        if (!$empaccrep) {
            return response()->json([
                'message' => 'Account Representative not found'
            ], 404);
        }
        $empaccrep->delete();
        return response()->json([
            'message' => 'Account Representative deleted successfully'
        ], 200);
    }
}
