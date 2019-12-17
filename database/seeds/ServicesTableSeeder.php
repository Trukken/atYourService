<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert(
            [
                [
                    'name' => 'Plumber',
                    'short_description' => 'Offering plumber services.',
                    'long_description' => 'Hey, I am from Luxembourg and I am offering my plumbing services for a reasonable price.',
                    'user_id' => 2,
                    'banned' => false,
                ], [
                    'name' => 'Developer',
                    'short_description' => 'I will develop your web application.',
                    'long_description' => 'Hey, I am John and I will develop any web based application for you, I use PHP and JS.',
                    'user_id' => 2,
                    'banned' => false,
                ], [
                    'name' => 'Driver',
                    'short_description' => 'Best driver ever.',
                    'long_description' => 'Hello! I will drive you wherever in Luxembourg or it\'s vicinity.',
                    'user_id' => 3,
                    'banned' => false,
                ], [
                    'name' => 'Truck driver',
                    'short_description' => 'Looking to take international deliveries.',
                    'long_description' => 'Hola! I am looking to drive my truck all around Europe.',
                    'user_id' => 4,
                    'banned' => false,
                ], [
                    'name' => 'Eceltrician',
                    'short_description' => 'I will fix stuff.',
                    'long_description' => 'call me if you have broke down electronics i can fix it',
                    'user_id' => 6,
                    'banned' => false,
                ], [
                    'name' => 'Receptionist',
                    'short_description' => 'I will wait for your costumers any time!',
                    'long_description' => 'Hello! My name is Jane, I had worked with enterprises before such as BIL as a receptionist and they were content with me. I am looking for a new challenge at another company now.',
                    'user_id' => 1,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 2,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 2,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 2,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 3,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 1,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 6,
                    'banned' => false,
                ], [
                    'name' => 'Business manager',
                    'short_description' => 'I will manage your business like no one else before.',
                    'long_description' => 'Good day sir, I have 10 years of experience in my field, I have worked with numerous enterprises before such as BCEE and Weblogistics. I am looking for a new challenge now, give me a call if you are interested.',
                    'user_id' => 5,
                    'banned' => false,
                ],
            ]
        );
    }
}
