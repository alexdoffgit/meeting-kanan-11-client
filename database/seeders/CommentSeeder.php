<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomsId = DB::table('rooms')->select('id')->get();
        $r2Id = $roomsId[0]->id;
        $r3Id = $roomsId[1]->id;
        $r4Id = $roomsId[2]->id;
        $r5Id = $roomsId[3]->id;

        DB::table('comments')->insert([
            [
                'rating' => 3,
                'content' => 'Quisque viverra placerat egestas. Mauris iaculis purus velit.',
                'room_id' => $r2Id,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'rating' => 4,
                'content' => 'Morbi aliquet vitae nisl et posuere. Vestibulum eget.',
                'room_id' => $r2Id,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'rating' => 2,
                'content' => 'Integer tristique mi nec purus dapibus pellentesque. Sed.',
                'room_id' => $r3Id,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'rating' => 3,
                'content' => 'Suspendisse blandit lobortis nibh, a faucibus nisl rutrum.',
                'room_id' => $r4Id,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
            [
                'rating' => 4,
                'content' => 'Sed eget tincidunt dolor. Donec sit amet bibendum.',
                'room_id' => $r5Id,
                'user_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
