<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StripePricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stripe_pricing')->insertOrIgnore([
            [
                'product_id' => 'prod_TS7z3ZrDMnRe2X',
                'product_name' => 'Subscription Plan (Free) 14 Days',
                'price_id' => 'price_1SVDjL6DanUWvEux2OlsFeEh',
                'amount' => 0.00,
                'currency' => 'USD',
                'maker_id' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 'prod_TCLR8HQRhMDntv',
                'product_name' => 'Subscription Plan (Basic) 1 Month',
                'price_id' => 'price_1SFwky6DanUWvEuxt222xhu1',
                'amount' => 79.99,
                'currency' => 'USD',
                'maker_id' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 'prod_TCLUYnpHyMpe8W',
                'product_name' => 'Subscription Plan (Business) 1 Month',
                'price_id' => 'price_1SFwn36DanUWvEuxs3TOv4av',
                'amount' => 149.99,
                'currency' => 'USD',
                'maker_id' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}