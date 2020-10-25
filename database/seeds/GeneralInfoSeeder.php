<?php

use App\Models\Department;
use App\Models\Directorate;
use App\Models\GeneralManager;
use App\Models\Governor;
use App\Models\GovernorAgent;
use App\Models\Office;
use App\Models\Province;
use Illuminate\Database\Seeder;

class GeneralInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # Povernors Seed
        $provinces = [
            [
                'name'       => 'province 1',
                'phone'      => '000000001',
                'created_at' => now(),

            ],
            [
                'name'       => 'province 2',
                'phone'      => '000000002',
                'created_at' => now(),

            ],
            [
                'name'       => 'province 3',
                'phone'      => '000000003',
                'created_at' => now(),

            ],
            [
                'name'       => 'province 4',
                'phone'      => '000000004',
                'created_at' => now(),

            ],
            [
                'name'       => 'province 5',
                'phone'      => '000000005',
                'created_at' => now(),

            ],
            [
                'name'       => 'province 6',
                'phone'      => '000000006',
                'created_at' => now(),

            ],
        ];
        Province::insert($provinces);

        # Governors Seed
        $governors = [
            [
                'name'        => 'governor 1',
                'phone'       => '000000001',
                'province_id' => 1,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor 2',
                'phone'       => '000000002',
                'province_id' => 2,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor 3',
                'phone'       => '000000003',
                'province_id' => 3,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor 4',
                'phone'       => '000000004',
                'province_id' => 4,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor 5',
                'phone'       => '000000005',
                'province_id' => 5,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor 6',
                'phone'       => '000000006',
                'province_id' => 6,
                'created_at'  => now(),
            ],
        ];
        Governor::insert($governors);

        # GovernorAgents Seed
        $governorAgents = [
            [
                'name'        => 'governor agent 1.1',
                'phone'       => '000000011',
                'governor_id' => 1,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 1.2',
                'phone'       => '000000012',
                'governor_id' => 1,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 2.1',
                'phone'       => '000000021',
                'governor_id' => 2,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 2.2',
                'phone'       => '000000022',
                'governor_id' => 2,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 3.1',
                'phone'       => '000000031',
                'governor_id' => 3,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 3.2',
                'phone'       => '000000032',
                'governor_id' => 3,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 4.1',
                'phone'       => '000000041',
                'governor_id' => 4,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 4.2',
                'phone'       => '000000042',
                'governor_id' => 4,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 5.1',
                'phone'       => '000000051',
                'governor_id' => 5,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 5.2',
                'phone'       => '000000052',
                'governor_id' => 5,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 6.1',
                'phone'       => '000000061',
                'governor_id' => 6,
                'created_at'  => now(),
            ],
            [
                'name'        => 'governor agent 6.2',
                'phone'       => '000000062',
                'governor_id' => 6,
                'created_at'  => now(),
            ],
        ];
        GovernorAgent::insert($governorAgents);

        # Directorates Seed
        $directorates = [
            [
                'name'        => 'directorate 1',
                'phone'       => '000000001',
                'province_id' => 1,
                'created_at'  => now(),
            ],
            [
                'name'        => 'directorate 2',
                'phone'       => '000000002',
                'province_id' => 2,
                'created_at'  => now(),
            ],
            [
                'name'        => 'directorate 3',
                'phone'       => '000000003',
                'province_id' => 3,
                'created_at'  => now(),
            ],
            [
                'name'        => 'directorate 4',
                'phone'       => '000000004',
                'province_id' => 4,
                'created_at'  => now(),
            ],
            [
                'name'        => 'directorate 5',
                'phone'       => '000000005',
                'province_id' => 5,
                'created_at'  => now(),
            ],
            [
                'name'        => 'directorate 6',
                'phone'       => '000000006',
                'province_id' => 6,
                'created_at'  => now(),
            ],
        ];
        Directorate::insert($directorates);

        # Departments Seed
        $departments = [
            [
                'name'        => 'department 1',
                'phone'       => '000000001',
                'province_id' => 1,
                'created_at'  => now(),
            ],
            [
                'name'        => 'department 2',
                'phone'       => '000000002',
                'province_id' => 2,
                'created_at'  => now(),
            ],
            [
                'name'        => 'department 3',
                'phone'       => '000000003',
                'province_id' => 3,
                'created_at'  => now(),
            ],
            [
                'name'        => 'department 4',
                'phone'       => '000000004',
                'province_id' => 4,
                'created_at'  => now(),
            ],
            [
                'name'        => 'department 5',
                'phone'       => '000000005',
                'province_id' => 5,
                'created_at'  => now(),
            ],
            [
                'name'        => 'department 6',
                'phone'       => '000000006',
                'province_id' => 6,
                'created_at'  => now(),
            ],
        ];
        Department::insert($departments);

        # Offices Seed
        $offices = [
            [
                'name'           => 'office 1',
                'phone'          => '000000001',
                'directorate_id' => 1,
                'created_at'     => now(),
            ],
            [
                'name'           => 'office 2',
                'phone'          => '000000002',
                'directorate_id' => 2,
                'created_at'     => now(),
            ],
            [
                'name'           => 'office 3',
                'phone'          => '000000003',
                'directorate_id' => 3,
                'created_at'     => now(),
            ],
            [
                'name'           => 'office 4',
                'phone'          => '000000004',
                'directorate_id' => 4,
                'created_at'     => now(),
            ],
            [
                'name'           => 'office 5',
                'phone'          => '000000005',
                'directorate_id' => 5,
                'created_at'     => now(),
            ],
            [
                'name'           => 'office 6',
                'phone'          => '000000006',
                'directorate_id' => 6,
                'created_at'     => now(),
            ],
        ];
        Office::insert($offices);

        # GeneralManagers Seed
        $generalManagers = [
            [
                'name'            => 'general manager 1',
                'phone'           => '700000001',
                'manageable_id'   => 1,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2',
                'phone'           => '700000002',
                'manageable_id'   => 2,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 3',
                'phone'           => '700000003',
                'manageable_id'   => 3,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 4',
                'phone'           => '700000004',
                'manageable_id'   => 4,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 5',
                'phone'           => '700000005',
                'manageable_id'   => 5,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 6',
                'phone'           => '700000006',
                'manageable_id'   => 6,
                'manageable_type' => 'App\Models\Directorate',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-1',
                'phone'           => '700000011',
                'manageable_id'   => 1,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-2',
                'phone'           => '700000012',
                'manageable_id'   => 2,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-3',
                'phone'           => '700000013',
                'manageable_id'   => 3,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-4',
                'phone'           => '700000014',
                'manageable_id'   => 4,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-5',
                'phone'           => '700000015',
                'manageable_id'   => 5,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 1-6',
                'phone'           => '700000016',
                'manageable_id'   => 6,
                'manageable_type' => 'App\Models\Department',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-1',
                'phone'           => '700000021',
                'manageable_id'   => 1,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-2',
                'phone'           => '700000022',
                'manageable_id'   => 2,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-3',
                'phone'           => '700000023',
                'manageable_id'   => 3,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-4',
                'phone'           => '700000024',
                'manageable_id'   => 4,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-5',
                'phone'           => '700000025',
                'manageable_id'   => 5,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
            [
                'name'            => 'general manager 2-6',
                'phone'           => '700000026',
                'manageable_id'   => 6,
                'manageable_type' => 'App\Models\Office',
                'created_at'      => now(),
            ],
        ];
        if (count($generalManagers) > 0) {
            GeneralManager::insert($generalManagers);
        };

    }
}
