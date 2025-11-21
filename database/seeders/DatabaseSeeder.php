<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        Role::create([
            'role_name' => 'JSK',
            'role_desc' => 'Job Seeker with limited access',
            'created_by' => 'system',
        ]);

        Role::create([
            'role_name' => 'EMP',
            'role_desc' => 'Employer with limited access',
            'created_by' => 'system',
        ]);

        Role::create([
            'role_name' => 'ADM',
            'role_desc' => 'Administrator with full access',
            'created_by' => 'system',

        ]);

        User::factory()->create([
            'name' => 'Job_Seeker01',
            'email' => 'jobseeker1@uat.com',
            'role' => 'JSK',
            'password' => bcrypt('password123'),
            'account_type' => 'email'
        ]);

        // User::factory()->create([
        //     'name' => 'Job_Seeker02',
        //     'email' => 'jobseeker2@uat.com',
        //     'role' => 'JSK',
        //     'password' => bcrypt('password123'),
        //     'account_type' => 'email'
        // ]);

        User::factory()->create([
            'name' => 'Admin01',
            'email' => 'admin@uat.com',
            'role' => 'ADM',
            'account_type' => 'email',
            'password' => bcrypt('password123'),
        ]);

        User::factory()->create([
            'name' => 'Employer01',
            'email' => 'employer1@uat.com',
            'role' => 'EMP',
            'password' => bcrypt('password123'),
            'account_type' => 'email'
        ]);

        $this->call([
            IndustrySeeder::class,
            SkillSeeder::class,
            ProfileSeeder::class,
            ProfileExperienceSeeder::class,
            ProfileEducationSeeder::class,
            ProfileCertificateSeeder::class,
            ProfileSkillSeeder::class,
            EmpProfileSeeder::class,
            EmpAccRepSeeder::class,
            EmpBizVerSeeder::class,
            JobPostingSeeder::class,
            // JobSkillSeeder::class,
            SubscriptionPlanSeeder::class,
            // StripePricingSeeder::class,
        ]);
    }
}