<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_profiles')->insertOrIgnore([
            [
                'first_name' => 'Yes',
                'last_name' => 'King',
                'work_email'=> 'jobseeker@uat.com',
                'phone_number' => '1234567890',
                'date_of_birth' => '1990-01-01',
                'profile_img' => null,
                'profile_desc' => 'Yoo LISTEN LISTEN LISTEN. Dont just say that shit because im asking you. There is a hundnid thousand niggers ON TWITTER',
                'address' => 'Phnom Penh, 123',
                'country' => 'Cambodia',

                'user_id' => 1

            ]
        ]);

        DB::table('jsk_profiles')->insertOrIgnore([
            [
                'first_name' => 'Dreamy',
                'last_name' => 'Bull',
                'work_email'=> 'jobseeker2@uat.com',
                'phone_number' => '1234567890',
                'date_of_birth' => '1990-01-01',
                'profile_img' => null,
                'profile_desc' => 'Ambatubus',
                'address' => 'Phnom Penh, 123',
                'country' => 'Cambodia',

                'user_id' => 2

            ]
        ]);
    }
}
