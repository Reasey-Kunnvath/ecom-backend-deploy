<?php

namespace Database\Seeders;

use App\Models\GenIndustry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            [
                'industry_code' => 'TECH',
                'industry_name' => 'Technology',
                'is_active' => true,
                'desc' => 'Includes software development, IT services, and hardware manufacturing.',
            ],
            [
                'industry_code' => 'FIN',
                'industry_name' => 'Finance',
                'is_active' => true,
                'desc' => 'Covers banking, insurance, and financial services.',
            ],
            [
                'industry_code' => 'HLTH',
                'industry_name' => 'Healthcare',
                'is_active' => true,
                'desc' => 'Encompasses medical services, pharmaceuticals, and biotechnology.',
            ],
            [
                'industry_code' => 'EDU',
                'industry_name' => 'Education',
                'is_active' => true,
                'desc' => 'Includes schools, universities, and educational technology.',
            ],
            [
                'industry_code' => 'MFG',
                'industry_name' => 'Manufacturing',
                'is_active' => true,
                'desc' => 'Involves production of goods, including automotive and electronics.',
            ],
            [
                'industry_code' => 'RTL',
                'industry_name' => 'Retail',
                'is_active' => true,
                'desc' => null,
            ],
            [
                'industry_code' => 'CONS',
                'industry_name' => 'Construction',
                'is_active' => false,
                'desc' => 'Covers building and infrastructure development.',
            ],
            [
                'industry_code' => 'HOSP',
                'industry_name' => 'Hospitality',
                'is_active' => true,
                'desc' => 'Includes hotels, restaurants, and tourism services.',
            ],
        ];

        foreach ($industries as $industry) {
            GenIndustry::create($industry);
        }
    }
}