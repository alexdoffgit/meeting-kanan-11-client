<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomsId = DB::table('rooms')->select('id')->get();

        DB::insert("INSERT INTO bookings (booking_day_start,booking_day_end,booking_time_start,booking_time_end,attendant,room_id,order_id) VALUES
                    ('2022-01-07 04:19:21.0','2022-01-09 04:19:44.0','2022-12-02 06:20:18.0','2022-12-02 09:20:51.0',2,?,2),
                    ('2023-02-04 04:22:23.0','2023-02-07 04:22:42.0','2022-12-02 08:23:11.0','2022-12-02 12:23:14.0',2,?,3),
                    ('2023-02-07 05:45:43.0','2023-03-08 05:46:25.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',7,?,4),
                    ('2022-04-14 05:46:53.0','2022-04-16 05:47:52.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',2,?,5),
                    ('2023-05-14 05:47:17.0','2023-05-16 05:47:34.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',3,?,1);", 
                    [$roomsId[1]->id,$roomsId[2]->id,$roomsId[1]->id,$roomsId[0]->id,$roomsId[3]->id]);
    }
}
