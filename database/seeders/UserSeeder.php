<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
    }
}
