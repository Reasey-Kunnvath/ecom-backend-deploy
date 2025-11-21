<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpBizVerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emp_biz_verifications')->insert([
            'biz_reg_no' => 'REG123456',
            'biz_license_img' => null,
            'profile_id' => '1',
        ]);
    }
}
