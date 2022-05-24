<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_appointments')->insert(['time' => new DateTime('11:00:00')]);
        DB::table('time_appointments')->insert(['time' => new DateTime('11:10:00')]);
        DB::table('time_appointments')->insert(['time' => new DateTime('11:20:00')]);
        DB::table('time_appointments')->insert(['time' => new DateTime('11:30:00')]);
    }
}
