<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'title'       => 'Unit 1',
                'symbol'      => 'u1',
                'description' => 'description unit one',
            ],
            [
                'title'       => 'Unit 2',
                'symbol'      => 'u2',
                'description' => 'description unit two',
            ],
            [
                'title'       => 'Unit 3',
                'symbol'      => 'u3',
                'description' => 'description unit three',
            ],
        ];
        \App\Models\Unit::insert($units);
    }
}
