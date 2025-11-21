<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobSkill = [
            [
                'skill_id' => 1,
                'job_id' => 1
            ],
            [
                'skill_id' => 2,
                'job_id' => 1
            ],
            [
                'skill_id' => 3,
                'job_id' => 1
            ],
            [
                'skill_id' => 4,
                'job_id' => 1
            ],
            [
                'skill_id' => 5,
                'job_id' => 1
            ],
            [
                'skill_id' => 5,
                'job_id' => 2
            ]
        ];

        foreach ($jobSkill as $skill) {
            DB::table('dc_job_skills')->insert([
                'skill_id' => $skill['skill_id'],
                'job_id' => $skill['job_id']
            ]);
        }
    }
}
