<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_profile_experience')->insertOrIgnore(
            [
                'job_title' => 'Software Engineer',
                'company_name' => 'Tech Solutions',
                'start_date' => '2022-01-01',
                'end_date' => '2023-01-01',
                'company_address' => '123 Tech Street, Silicon Valley',
                'description' => 'Worked on developing and maintaining web applications.',
                'profile_id' => 1,
            ]
        );

        DB::table('jsk_profile_experience')->insertOrIgnore(
            [
                'job_title' => 'Data Warehouse Engineer',
                'company_name' => 'Tech Solutions',
                'start_date' => '2023-02-01',
                'end_date' => null,
                'company_address' => '123 Tech Street, Silicon Valley',
                'description' => 'Responsible for designing and implementing data warehouse solutions.',
                'profile_id' => 1,
            ]
        );


    }
}
