<?php

namespace App\Http\Controllers\api\subscription;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;

#[Group('Subscription')]
class SubscriptionController extends Controller
{
    /**
     * get all available plans
     */
    public function getAllPlans()
    {
        $plans = SubscriptionPlan::where('is_active', true)->get();
        return response ()->json([
            'plans' => $plans
        ], 200);
    }
}
