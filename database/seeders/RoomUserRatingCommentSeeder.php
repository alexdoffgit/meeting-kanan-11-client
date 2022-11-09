<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoomUserRatingCommentSeeder extends Seeder
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
                'password' => Hash::make('adi')
            ],
            [
                'name' => 'nana',
                'last_name' => 'padji',
                'email' => 'nana@mail.com',
                'password' => Hash::make('nana')
            ],
            [
                'name' => 'ijat',
                'last_name' => 'lala',
                'email' => 'ijat@mail.com',
                'password' => Hash::make('ijat')
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
    
        DB::table('comments')->insert([
            [
                'rating' => 7,
                'content' => 'Quisque viverra placerat egestas. Mauris iaculis purus velit.',
                'room_id' => $r2Id,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'rating' => 8,
                'content' => 'Morbi aliquet vitae nisl et posuere. Vestibulum eget.',
                'room_id' => $r2Id,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'rating' => 6,
                'content' => 'Integer tristique mi nec purus dapibus pellentesque. Sed.',
                'room_id' => $r3Id,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'rating' => 7,
                'content' => 'Suspendisse blandit lobortis nibh, a faucibus nisl rutrum.',
                'room_id' => $r4Id,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
            [
                'rating' => 8,
                'content' => 'Sed eget tincidunt dolor. Donec sit amet bibendum.',
                'room_id' => $r5Id,
                'user_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
