<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emp_profiles')->insert([
            'company_name' => 'Tech Innovators Inc.',
            'company_size' => '<100',
            'industry' => 'Information Technology',
            'hq_address' => '123 Tech Lane, Silicon Valley, CA',
            'description' => 'Leading the way in tech innovation and solutions.',
            'company_img' => null,
            'user_id' => '3',
        ]);
    }
}
