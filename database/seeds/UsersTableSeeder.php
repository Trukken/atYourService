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
                    'email_verified' => false,
                    'phone_number' => 661666666,
                    'image' => 'https://randomuser.me/api/portraits/men/29.jpg',
                    'admin' => true,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'John Doe',
                    'email' => 'janedoe@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => false,
                    'phone_number' => 661666666,
                    'image' => 'https://randomuser.me/api/portraits/men/29.jpg',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ]
            ]
        );
    }
}
