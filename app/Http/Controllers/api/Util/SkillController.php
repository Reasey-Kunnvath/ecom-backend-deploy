<?php

namespace App\Http\Controllers\api\Util;

use App\Models\JskSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('Common')]
class SkillController extends Controller
{
    /**
     * Search Skills by Name & Industry
     */
    public function searchSkills(Request $request){
        $industry = $request->get('industry');
        $name = $request->get('name');

        $query = JskSkill::query();

        if($name){
            $query->where(DB::raw('UPPER(skill_name)'), 'like', '%' . strtoupper($name) . '%');
        }

        if($industry){
            $query->where('skill_category', $industry);
        }

        return response()->json([
            'data' => $query->get(),
            'message' => 'Skills retrieved successfully',
        ]);
    }
}