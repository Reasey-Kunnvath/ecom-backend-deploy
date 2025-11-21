<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'plan_code' => 'FREE',
                'plan_name' => 'Free Plan',
                'plan_price' => 0.00,
                'plan_description' => 'Basic plan with limited features',
                'plan_duration' => 14,
                'max_post' => 1,
                'is_active' => true,
                'plan_features' => [
                    '0 USD (Free)',
                    'Limited to only 1 Job Post',
                    '14 days',
                    'Basic Visibility',
                    'Access to Candidate Applications',
                    'Analytics and Reporting',
                    'Email Only',
                    'Startups/Trial Users'
                ],
            ],
            // [
            //     'plan_code' => 'SPSM1',
            //     'plan_name' => 'Startups',
            //     'plan_price' => 79.99,
            //     'plan_description' => 'Ideal for small-sized businesses with hiring small teams',
            //     'plan_duration' => 30,
            //     'max_post' => 5,
            //     'is_active' => true,
            //     'plan_features' => [
            //         'Starts from 79.99 USD Per Month',
            //         'Limit of 10 Active Posts at same time',
            //         'Post is active as long as you keep the subscription is active',
            //         'Enhanced Post Visibility',
            //         'Access to Candidate Applications',
            //         'Full Analytics and Reporting',
            //         'Dedicated Support',
            //         'Best For Startups/Small Businesses'
            //     ],
            //     'stripe_price_id' => 'price_1SFwky6DanUWvEuxt222xhu1'
            // ],
            // [
            //     'plan_code' => 'SPEM1',
            //     'plan_name' => 'Enterprise',
            //     'plan_price' => 149.99,
            //     'plan_description' => 'Ideal for small-sized businesses with hiring small teams',
            //     'plan_duration' => 30,
            //     'max_post' => 10,
            //     'is_active' => true,
            //     'plan_features' => [
            //         'Starts at 149.99 USD Per Month',
            //         'Limit of 10 Active Posts at same time',
            //         'Post is active as long as you keep the subscription is active',
            //         'Enhanced Post Visibility',
            //         'Access to Candidate Applications',
            //         'Advanced Analytics and Reporting',
            //         'Dedicated Support',
            //         'Best For Agencies/Enterprises'
            //     ],
            //     'stripe_price_id' => 'price_1SFwn36DanUWvEuxs3TOv4av'
            // ]
        ];
        foreach ($plans as $plan) {
            SubscriptionPlan::create($plan);
        }
    }
}
