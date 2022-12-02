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

        DB::insert("INSERT INTO bookings (booking_day_start,booking_day_end,booking_time_start,booking_time_end,attendant,room_id,order_id,created_at,updated_at) VALUES
                    ('2022-12-07 04:19:21.0','2022-12-09 04:19:44.0','2022-12-02 06:20:18.0','2022-12-02 09:20:51.0',2,?,2,'2022-12-02 11:21:28.0','2022-12-02 11:21:31.0'),
                    ('2023-01-04 04:22:23.0','2023-01-07 04:22:42.0','2022-12-02 08:23:11.0','2022-12-02 12:23:14.0',2,?,3,'2022-12-02 11:23:59.0','2022-12-02 11:24:01.0'),
                    ('2023-02-07 05:45:43.0','2023-02-08 05:46:25.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',7,?,4,'2022-12-02 11:26:29.0','2022-12-02 11:26:32.0'),
                    ('2022-12-14 05:46:53.0','2022-12-16 05:47:52.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',2,?,5,'2022-12-02 11:28:02.0','2022-12-02 11:28:05.0'),
                    ('2023-01-14 05:47:17.0','2023-01-16 05:47:34.0','2022-12-02 06:48:17.0','2022-12-02 08:48:33.0',3,?,1,'2022-12-02 11:28:35.0','2022-12-02 11:28:38.0');", 
                    [$roomsId[1]->id,$roomsId[2]->id,$roomsId[1]->id,$roomsId[0]->id,$roomsId[3]->id]);
    }
}
