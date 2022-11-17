<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoomUserCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'adi',
                'last_name' => 'putra',
                'email' => 'adi@mail.com',
                'role' => 'user',
                'password' => Hash::make('adi')
            ],
            [
                'name' => 'nana',
                'last_name' => 'padji',
                'email' => 'nana@mail.com',
                'role' => 'user',
                'password' => Hash::make('nana')
            ],
            [
                'name' => 'ijat',
                'last_name' => 'lala',
                'email' => 'ijat@mail.com',
                'role' => 'user',
                'password' => Hash::make('ijat')
            ],
            [
                'name' => 'fira',
                'last_name' => 'author',
                'email' => 'fira@mail.com',
                'role' => 'admin',
                'password' => Hash::make('heyngapainsu'),
            ]
        ]);

        $r2Id = uniqid();
        $r3Id = uniqid();
        $r4Id = uniqid();
        $r5Id = uniqid();

        DB::table('rooms')->insert([
            [
                'id' => $r2Id,
                'room_name' => 'r2',
                'location' => '2',
                'description' => 'Proin luctus non tellus at hendrerit. Quisque finibus rutrum purus, ac fringilla nunc imperdiet non.',
                'maxpeople' => 4,
                'price' => 30.8
            ],
            [
                'id' => $r3Id,
                'room_name' => 'r3',
                'location' => '3',
                'description' => 'Nullam eget nisi metus. Cras malesuada, erat sed tincidunt hendrerit, nisl leo consequat justo, a.',
                'maxpeople' => 6,
                'price' => 17.7
            ],
            [
                'id' => $r4Id,
                'room_name' => 'r4',
                'location' => '4',
                'description' => 'Sed eu commodo erat, in tristique eros. Ut justo ipsum, convallis nec mattis sit amet.',
                'maxpeople' => 5,
                'price' => 66.1
            ],
            [
                'id' => $r5Id,
                'room_name' => 'r5',
                'location' => '5',
                'description' => 'Curabitur ipsum nulla, scelerisque eget volutpat eget, molestie id mi. In eget lacus quis nibh.',
                'maxpeople' => 8,
                'price' => 71.4
            ]
        ]);

        DB::table('room_images')->insert([
            [
                'thumbnail' => true,
                'image_url' => 'storage/room_images/room1.jpeg',
                'room_id' => $r2Id,
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd1.jpeg',
                'room_id' => $r2Id
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd2.jpeg',
                'room_id' => $r2Id
            ],

            [
                'thumbnail' => true,
                'image_url' => 'storage/room_images/room2.jpeg',
                'room_id' => $r3Id
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd3.jpeg',
                'room_id' => $r3Id,
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd4.jpeg',
                'room_id' => $r3Id
            ],

            [
                'thumbnail' => true,
                'image_url' => 'storage/room_images/room3.jpeg',
                'room_id' => $r4Id
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd5.jpeg',
                'room_id' => $r4Id
            ], 
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd6.jpeg',
                'room_id' => $r4Id
            ],

            [
                'thumbnail' => true,
                'image_url' => 'storage/room_images/room4.jpeg',
                'room_id' => $r5Id
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd7.jpeg',
                'room_id' => $r5Id
            ],
            [
                'thumbnail' => false,
                'image_url' => 'storage/room_images/rd8.jpeg',
                'room_id' => $r5Id
            ]
        ]);

        DB::table('carts')->insert([
            [            
                'booking_day_start' => Carbon::now(),
                'booking_day_end' => Carbon::now()->addDays(2),
                'booking_time_start' => Carbon::now()->addHours(),
                'booking_time_end' => Carbon::now()->addHours(3),
                'room_id' => $r2Id,
                'attendant' => 2,
                'user_id' => 2
            ],
            [
                'booking_day_start' => Carbon::now()->addWeek(),
                'booking_day_end' => Carbon::now()->addWeek()->addDays(2),
                'booking_time_start' => Carbon::now()->addWeek()->addHours(),
                'booking_time_end' => Carbon::now()->addWeek()->addHours(3),
                'room_id' => $r2Id,
                'attendant' => 2,
                'user_id' => 3
            ]
        ]); 
    }
}
