<?php

namespace Database\Seeders;

use DateTime;
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
            'first_name' => 'Martin',
            'last_name' => 'Scott',
            'login' => 'user1',
            'password' => Hash::make('password'),
            'email' => 'user1@mail.com',
            'phone' => '79271845234',
            'date_of_birth' => new DateTime(),
            'city' => 'Moscow',
            'access_level' => 0,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Filipp',
            'last_name' => 'Ton',
            'login' => 'doctor1',
            'password' => Hash::make('password'),
            'email' => 'doctor1@mail.com',
            'phone' => '79271444434',
            'date_of_birth' => new DateTime(),
            'city' => 'Moscow',
            'access_level' => 1,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Alex',
            'last_name' => 'Maralex',
            'login' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@mail.com',
            'phone' => '79272843234',
            'date_of_birth' => new DateTime(),
            'city' => 'Moscow',
            'access_level' => 5,
        ]);
    }
}
