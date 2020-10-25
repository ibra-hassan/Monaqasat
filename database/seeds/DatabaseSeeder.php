<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
                        PermissionsTableSeeder::class,
                        RolesTableSeeder::class,
                        PermissionRoleTableSeeder::class,
                        UsersTableSeeder::class,
                        RoleUserTableSeeder::class,
                        EmployeeSeeder::class,
                        RoleEmployeeTableSeeder::class,
                        GeneralInfoSeeder::class,
                        ProjectSeeder::class,
                        TenderSeeder::class,
                        UnitSeeder::class,
                    ]);
    }
}
