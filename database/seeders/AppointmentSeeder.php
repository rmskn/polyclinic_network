<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            'user_id' => 1,
            'doctor_id' => 1,
            'total_price' => 2000,
            'date' => new DateTime(),
            'cabinet' => 4,
            'app_status' => 3,
        ]);

        DB::table('appointments')->insert([
            'user_id' => 1,
            'doctor_id' => 1,
            'total_price' => 1000,
            'date' => new DateTime(),
            'cabinet' => 5,
            'app_status' => 2,
        ]);
    }
}
