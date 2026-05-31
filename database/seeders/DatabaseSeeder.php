<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insertOrIgnore([
            [
                'full_name'  => 'Ahmed Al-Rashid',
                'email'      => 'ahmed@example.com',
                'phone'      => '+968-1234-5678',
                'department' => 'Engineering',
                'position'   => 'Developer',
                'salary'     => 1500.00,
                'hire_date'  => '2023-01-15',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Sara Al-Balushi',
                'email'      => 'sara@example.com',
                'phone'      => '+968-2345-6789',
                'department' => 'HR',
                'position'   => 'HR Manager',
                'salary'     => 1800.00,
                'hire_date'  => '2022-06-01',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name'  => 'Mohammed Al-Farsi',
                'email'      => 'mohammed@example.com',
                'phone'      => '+968-3456-7890',
                'department' => 'Finance',
                'position'   => 'Accountant',
                'salary'     => 1400.00,
                'hire_date'  => '2023-03-10',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
