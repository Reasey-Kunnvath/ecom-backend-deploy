<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpAccRepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emp_account_representatives')->insert([
            'full_name' => 'Spongebob Squarepants',
            'job_title' => 'HR Manager',
            'email' => 'jobseeker@uat.com',
            'phone_number' => '1234567890',
            'profile_id' => '1',
        ]);
    }
}
