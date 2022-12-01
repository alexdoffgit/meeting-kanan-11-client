<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CartSeeder extends Seeder
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
