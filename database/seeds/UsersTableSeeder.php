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
                    'name' => 'Jane Doe',
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
                ],
                [
                    'name' => 'Jérôme Plouffe',
                    'email' => 'j.plouffe@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => false,
                    'phone_number' => 1111111,
                    'image' => 'https://www.chinadaily.com.cn/celebrity/img/attachement/jpg/site1/20131211/001ec97909631412122b07.jpg',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'Tristan Tourneur',
                    'email' => 't.tourner@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => false,
                    'phone_number' => 661666666,
                    'image' => 'https://ph-files.imgix.net/81c8176a-1b00-4f10-b60f-2ab2729d0a14',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'Josselin Mace',
                    'email' => 'j.mace@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => true,
                    'phone_number' => 787897987987,
                    'image' => 'https://stackabuse.s3.amazonaws.com/media/introduction-to-gans-with-python-2.jpg',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'Phil Boffrand',
                    'email' => 's.layer@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => true,
                    'phone_number' => 999999,
                    'image' => 'https://randomuser.me/api/portraits/men/29.jpg',
                    'admin' => true,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'Nicolas Trottier',
                    'email' => 'n.trotti@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => false,
                    'phone_number' => 661666666,
                    'image' => 'https://randomuser.me/api/portraits/men/29.jpg',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ],
                [
                    'name' => 'Phil Vasseur',
                    'email' => 'p.vasseur@mail.com',
                    'password' => '$2y$10$85EaL5UQ9qldySgJ8tfjXu4d4ayMDnoGGdC3lX9ppy7qdfXfYVZd.',
                    'email_verified' => true,
                    'phone_number' => 888888888,
                    'image' => 'https://randomuser.me/api/portraits/men/29.jpg',
                    'admin' => false,
                    'banned' => false,
                    'reported' => false,
                ],
            ]
        );
    }
}
