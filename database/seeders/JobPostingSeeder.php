<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            // [
            //     'job_title' => 'Frontend Developer',
            //     'job_desc' => 'We are seeking a creative Frontend Developer to build user-friendly interfaces.',
            //     'responsibilities' => [
            //         'Develop responsive web interfaces',
            //         'Optimize application performance',
            //         'Collaborate with designers and backend developers'
            //     ],
            //     'req_experience' => [
            //         '3+ years in frontend development',
            //         'Proficient in React or Vue.js'
            //     ],
            //     'req_education' => [
            //         'Bachelor degree in Computer Science or related field'
            //     ],
            //     'req_certificate' => [
            //         'Frontend Web Developer Nanodegree (optional)'
            //     ],
            //     'job_type' => 'Full-time',
            //     'work_mode' => 'Hybrid',
            //     'min_salary' => 35000,
            //     'max_salary' => 60000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Phnom Penh, Cambodia',
            //     'is_active' => true,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'Backend Developer',
            //     'job_desc' => 'Work on scalable backend systems and APIs.',
            //     'responsibilities' => [
            //         'Develop and maintain RESTful APIs',
            //         'Ensure database optimization',
            //         'Write clean, maintainable code'
            //     ],
            //     'req_experience' => [
            //         'Strong knowledge of PHP/Laravel or Node.js',
            //         'Experience with MySQL/PostgreSQL'
            //     ],
            //     'req_education' => [
            //         'Bachelor in Software Engineering'
            //     ],
            //     'req_certificate' => [
            //         'AWS Certified Developer (Preferred)'
            //     ],
            //     'job_type' => 'Full-time',
            //     'work_mode' => 'On-site',
            //     'min_salary' => 45000,
            //     'max_salary' => 75000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Bangkok, Thailand',
            //     'is_active' => true,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'UI/UX Designer',
            //     'job_desc' => 'Join our design team to craft intuitive digital experiences.',
            //     'responsibilities' => [
            //         'Design user flows and wireframes',
            //         'Work closely with frontend teams',
            //         'Conduct user testing and feedback analysis'
            //     ],
            //     'req_experience' => [
            //         'Experience in Figma, Adobe XD',
            //         'Understanding of user-centered design'
            //     ],
            //     'req_education' => [
            //         'Degree in Design, HCI, or related field'
            //     ],
            //     'req_certificate' => [],
            //     'job_type' => 'Contract',
            //     'work_mode' => 'Remote',
            //     'min_salary' => 30000,
            //     'max_salary' => 50000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Remote',
            //     'is_active' => false,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'DevOps Engineer',
            //     'job_desc' => 'Automate infrastructure and CI/CD pipelines.',
            //     'responsibilities' => [
            //         'Maintain and improve CI/CD processes',
            //         'Manage cloud infrastructure on AWS/Azure',
            //         'Ensure application reliability and scalability'
            //     ],
            //     'req_experience' => [
            //         'Experience with Docker, Kubernetes',
            //         'Strong Linux knowledge'
            //     ],
            //     'req_education' => [
            //         'Bachelor in Computer Science'
            //     ],
            //     'req_certificate' => [
            //         'AWS Certified DevOps Engineer'
            //     ],
            //     'job_type' => 'Full-time',
            //     'work_mode' => 'Remote',
            //     'min_salary' => 60000,
            //     'max_salary' => 90000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Remote',
            //     'is_active' => true,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'Mobile App Developer',
            //     'job_desc' => 'Develop innovative mobile applications for iOS and Android.',
            //     'responsibilities' => [
            //         'Build and maintain mobile apps',
            //         'Work with REST APIs',
            //         'Troubleshoot and optimize performance'
            //     ],
            //     'req_experience' => [
            //         'Experience in Flutter or React Native',
            //         'Strong mobile UI/UX understanding'
            //     ],
            //     'req_education' => [
            //         'Bachelor in Computer Science or related field'
            //     ],
            //     'req_certificate' => [],
            //     'job_type' => 'Full-time',
            //     'work_mode' => 'On-site',
            //     'min_salary' => 40000,
            //     'max_salary' => 70000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Singapore',
            //     'is_active' => false,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'QA Engineer',
            //     'job_desc' => 'Ensure the quality of our software through testing and validation.',
            //     'responsibilities' => [
            //         'Write and execute test cases',
            //         'Automate regression tests',
            //         'Report and verify bugs'
            //     ],
            //     'req_experience' => [
            //         'Experience in software testing',
            //         'Knowledge of Selenium or Cypress'
            //     ],
            //     'req_education' => [
            //         'Bachelor degree in IT or related field'
            //     ],
            //     'req_certificate' => [
            //         'ISTQB Foundation Level'
            //     ],
            //     'job_type' => 'Contract',
            //     'work_mode' => 'Remote',
            //     'min_salary' => 25000,
            //     'max_salary' => 40000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Remote',
            //     'is_active' => true,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            // [
            //     'job_title' => 'Product Manager',
            //     'job_desc' => 'Oversee product strategy and execution across development teams.',
            //     'responsibilities' => [
            //         'Define product roadmap',
            //         'Coordinate between departments',
            //         'Analyze market trends'
            //     ],
            //     'req_experience' => [
            //         '5+ years of product management experience',
            //         'Strong leadership and communication skills'
            //     ],
            //     'req_education' => [
            //         'Bachelor or Master in Business or Tech Management'
            //     ],
            //     'req_certificate' => [
            //         'Certified Scrum Product Owner (CSPO)'
            //     ],
            //     'job_type' => 'Full-time',
            //     'work_mode' => 'Hybrid',
            //     'min_salary' => 70000,
            //     'max_salary' => 100000,
            //     'ccy' => 'USD',
            //     'job_location' => 'Kuala Lumpur, Malaysia',
            //     'is_active' => false,
            //     'posted_date' => now(),
            //     'expire_date' => now()->addMonth(),
            //     'maker_id' => 3
            // ],
            [
                'job_title' => 'System Administrator',
                'job_desc' => 'Manage and maintain servers, networks, and IT systems.',
                'responsibilities' => [
                    'Monitor system performance',
                    'Perform security updates and backups',
                    'Troubleshoot hardware and software issues'
                ],
                'req_experience' => [
                    'Strong Linux/Windows server knowledge',
                    'Experience with cloud environments'
                ],
                'req_education' => [
                    'IT or related field degree'
                ],
                'req_certificate' => [
                    'CompTIA Network+ or similar'
                ],
                'job_type' => 'Full-time',
                'work_mode' => 'On-site',
                'min_salary' => 35000,
                'max_salary' => 60000,
                'ccy' => 'USD',
                'job_location' => 'Manila, Philippines',
                'is_active' => true,
                'posted_date' => now(),
                'expire_date' => now()->addMonth(),
                'maker_id' => 3
            ]
        ];

        foreach ($jobs as $job) {
            JobPosting::create($job);
        }
    }
}
