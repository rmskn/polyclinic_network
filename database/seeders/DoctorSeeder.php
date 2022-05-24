<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'polyclinic_id' => 1,
            'user_id' => 2,
            'spec_id' => 1,
            'additional_specialization' => json_encode([2], JSON_THROW_ON_ERROR),
            'work_phone' => '79251234567',
            'working_hours' => json_encode(['start' => '12:00', 'end' => '18:00'], JSON_THROW_ON_ERROR),
        ]);
    }
}
