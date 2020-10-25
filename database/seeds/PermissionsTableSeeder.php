<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title'      => 'user_management_access',
                'created_at' => now(),
            ],
            [
                'title'      => 'general_information_access',
                'created_at' => now(),
            ],
            [
                'title'      => 'project_menu_access',
                'created_at' => now(),
            ],
            [
                'title'      => 'tender_menu_access',
                'created_at' => now(),
            ],
            [
                'title'      => 'activated_users',
                'created_at' => now(),
            ],
            [
                'title'      => 'accept_project',
                'created_at' => now(),
            ],
            [
                'title'      => 'ad_tender',
                'created_at' => now(),
            ],
        ];
        foreach (config('tender.Models') as $model) {
            foreach (config('tender.permissionsModel') as $permissionModel) {
                array_push(
                    $permissions,
                    [
                        'title'      => $model . $permissionModel,
                        'created_at' => now(),
                    ]
                );
            }
        }
        Permission::insert($permissions);
    }
}
