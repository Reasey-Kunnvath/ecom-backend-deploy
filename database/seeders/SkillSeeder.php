<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_skills')->insertOrIgnore([
           [
                'skill_code' => 'PHP',
                'skill_name' => 'PHP',
                'skill_desc' => 'Server-side scripting language',
                'skill_category' => 1,
                'created_by' => 'system',
            ],
            [
                'skill_code' => 'PHP_LARAVEL',
                'skill_name' => 'PHP Laravel',
                'skill_desc' => 'Server-side scripting language',
                'skill_category' => 1,
                'created_by' => 'system',
            ],
            [
                'skill_code' => 'PROMPT_ENGINEERING',
                'skill_name' => 'Prompt Engineering',
                'skill_desc' => 'Useless fucking skill',
                'skill_category' => 1,
                'created_by' => 'system',
            ],
            [
                'skill_code' => 'JS',
                'skill_name' => 'JavaScript',
                'skill_desc' => 'Client-side scripting language',
                'skill_category' => 1,
                'created_by' => 'system',
            ],
            [
                'skill_code' => 'SQL',
                'skill_name' => 'SQL',
                'skill_desc' => 'Structured Query Language',
                'skill_category' => 1,
                'created_by' => 'system',
            ],
        ]);
    }
}