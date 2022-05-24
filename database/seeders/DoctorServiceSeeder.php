<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_services')->insert([
            'doctor_id' => 1,
            'service_id' => 1,
        ]);

        DB::table('doctor_services')->insert([
            'doctor_id' => 1,
            'service_id' => 2,
        ]);
    }
}
