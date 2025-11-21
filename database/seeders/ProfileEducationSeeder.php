<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_profile_education')->insertOrIgnore([
            'institution_name' => 'University of NIGGERS',
            'degree' => 'Master of Niggers',
            'fos' => 'Niggers',
            'start_date' => '2018-01-01',
            'end_date' => '2025-01-01',
            'description' => 'Yoo LISTEN LISTEN LISTEN. Dont just say that shit because im asking you. There is a hundnid thousand niggers ON TWITTER',
            'profile_id' => 1
        ]);
    }
}
