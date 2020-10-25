<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'User 1',
                'email'          => 'user1@user1.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at' => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'User 2',
                'email'          => 'user2@user2.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at' => now(),
            ],
            [
                'id'             => 3,
                'name'           => 'User 3',
                'email'          => 'user3@user3.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
