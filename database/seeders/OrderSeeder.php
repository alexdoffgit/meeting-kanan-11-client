<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO orders (payment_order_id,status,user_id,created_at,updated_at) VALUES
                    ('das323asfa','pending',1,'2023-01-02 10:01:58.0','2023-01-02 10:02:09.0'),
                    ('23423svsdvgsrg','settlement',2,'2023-01-02 10:02:33.0','2023-01-02 10:02:38.0'),
                    ('rgegre34345','settlement',2,'2023-02-02 03:46:07.0','2023-02-02 03:46:07.0'),
                    ('3242342fsfsdf','settlement',2,'2023-03-02 03:46:54.0','2023-03-02 03:46:54.0'),
                    ('oooijoi21','cancel',3,'2023-01-02 10:47:40.0','2023-01-02 10:47:45.0');");    
    }
}
