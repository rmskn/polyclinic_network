<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserAdditionSeeder::class,
            PolyclinicSeeder::class,
            SpecializationSeeder::class,
            DoctorSeeder::class,
            ServiceSeeder::class,
            DoctorServiceSeeder::class,
            AppointmentStatusSeeder::class,
            TimeAppointmentSeeder::class,
            AppointmentSeeder::class,
            AppointmentItemSeeder::class,
            AnalysisSeeder::class,
            AppointmentConclusionSeeder::class
        ]);
    }
}
