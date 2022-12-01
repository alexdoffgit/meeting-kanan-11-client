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
        DB::table('orders')->insert([
                [
                    'payment_order_id' => uniqid(),
                    'status' => 'pending',
                    'user_id' => '1'
                ],
                [
                    'payment_order_id' => uniqid(),
                    'status' => 'settlement',
                    'user_id' => '1'
                ],
                [
                    'payment_order_id' => uniqid(),
                    'status' => 'cancel',
                    'user_id' => '2'
                ]
            ]);
    }
}
