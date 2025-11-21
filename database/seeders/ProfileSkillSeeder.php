<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_dc_profile_skill')->insertOrIgnore([
            'profile_id' => 1,
            'skill_id' => 2
        ]);

        DB::table('jsk_dc_profile_skill')->insertOrIgnore([
            'profile_id' => 1,
            'skill_id' => 3
        ]);

        DB::table('jsk_dc_profile_skill')->insertOrIgnore([
            'profile_id' => 1,
            'skill_id' => 5
        ]);

        DB::table('jsk_dc_profile_skill')->insertOrIgnore([
            'profile_id' => 1,
            'skill_id' => 4
        ]);
    }
}