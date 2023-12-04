<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'          => 'Admin',
                'email'         => 'admin@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 1,
            ],
            [
                'name'          => 'Employee 01',
                'email'         => 'employee01@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 2,
            ],
            [
                'name'          => 'Employee 2',
                'email'         => 'employee02@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 3,
            ],
            [
                'name'          => 'Employee 03',
                'email'         => 'employee03@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 1,
            ],
            [
                'name'          => 'Employee 04',
                'email'         => 'employee04@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 5,
            ],
            [
                'name'          => 'Employee 05',
                'email'         => 'employee05@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 1,
            ],
            [
                'name'          => 'Employee 06',
                'email'         => 'employee06@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 7,
            ],
            [
                'name'          => 'Employee 07',
                'email'         => 'employee07@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 1,
            ],
            [
                'name'          => 'Employee 08',
                'email'         => 'employee08@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 2,
            ],
            [
                'name'          => 'Employee 09',
                'email'         => 'employee09@gmail.com',
                'phone'         => '5552223336',
                'address'       => 'Dhaka',
                'department_id' => 1,
            ],
        ];

        Employee::insert($data);
    }
}
