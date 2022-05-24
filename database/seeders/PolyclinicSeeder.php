<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolyclinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('polyclinics')->insert([
            'title' => 'HealthLab 1',
            'city' => 'Moscow',
            'address' => 'Tverskaya street, 77',
            'phone' => '79281765678',
            'email' => 'polyclinic1@mail.com',
            'working_hours' => json_encode(['start' => '10:00', 'end' => '20:00'], JSON_THROW_ON_ERROR),
        ]);
    }
}
