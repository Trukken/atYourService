<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'John Doe',
                    'email' => 'johndoe@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'phone_number' => 661666666,
                    'admin' => false,
                    'banned' => false
                ],
                [
                    'name' => 'Jane Doe',
                    'email' => 'janedoe@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'phone_number' => 662666666,
                    'admin' => false,
                    'banned' => false
                ]
            ]
        );
    }
}
