<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jsk_profile_certificate')->insertOrIgnore([
            'certificate_title' => 'Master of Niggers',
            'issued_org' => 'University of NIGGERS',
            'issued_date' => '2025-08-14',
            'description' => 'Yoo LISTEN LISTEN LISTEN. Dont just say that shit because im asking you. There is a hundnid thousand niggers ON TWITTER',
            'profile_id' => 1
        ]);
    }
}
