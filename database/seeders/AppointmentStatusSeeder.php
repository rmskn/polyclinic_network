<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_statuses')->insert(['title' => 'Запись на приём оформлена']);
        DB::table('appointment_statuses')->insert(['title' => 'Запись на приём подтверждена']);
        DB::table('appointment_statuses')->insert(['title' => 'Идет прием']);
        DB::table('appointment_statuses')->insert(['title' => 'Приём завершен']);
        DB::table('appointment_statuses')->insert(['title' => 'Приём завершен и оплачен']);
        DB::table('appointment_statuses')->insert(['title' => 'Приём отменен']);
    }
}
