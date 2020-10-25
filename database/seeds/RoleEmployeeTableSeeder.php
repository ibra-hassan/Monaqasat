<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class RoleEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::findOrFail(1)->roles()->sync(1);
        Employee::findOrFail(2)->roles()->sync(2);
        Employee::findOrFail(3)->roles()->sync(2);
        Employee::findOrFail(4)->roles()->sync(2);
        Employee::findOrFail(5)->roles()->sync(2);
        Employee::findOrFail(6)->roles()->sync(2);
        Employee::findOrFail(7)->roles()->sync(2);
        Employee::findOrFail(8)->roles()->sync(2);
        Employee::findOrFail(9)->roles()->sync(2);
    }
}
