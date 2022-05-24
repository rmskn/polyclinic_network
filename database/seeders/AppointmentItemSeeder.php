<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_items')->insert([
            'app_id' => 1,
            'doc_service_id' => 1,
            'description' => 'serv desc 1',
            'price' => 1000
        ]);

        DB::table('appointment_items')->insert([
            'app_id' => 1,
            'doc_service_id' => 3,
            'description' => 'serv desc 3',
            'price' => 1000
        ]);

        DB::table('appointment_items')->insert([
            'app_id' => 2,
            'doc_service_id' => 1,
            'description' => 'serv desc 1',
            'price' => 1000
        ]);
    }
}
