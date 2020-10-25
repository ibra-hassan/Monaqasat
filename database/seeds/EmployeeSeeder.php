<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Employees = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'Employee One',
                'email'          => 'employee1@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 3,
                'name'           => 'Employee Two',
                'email'          => 'employee2@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 4,
                'name'           => 'Employee Three',
                'email'          => 'employee3@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 5,
                'name'           => 'Employee Four',
                'email'          => 'employee4@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 6,
                'name'           => 'Employee Fife',
                'email'          => 'employee5@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 7,
                'name'           => 'Employee Six',
                'email'          => 'employee6@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 8,
                'name'           => 'Employee Seven',
                'email'          => 'employee7@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
            [
                'id'             => 9,
                'name'           => 'Employee Eight',
                'email'          => 'employee8@employee.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'     => now(),
            ],
        ];

        Employee::insert($Employees);
    }
}
