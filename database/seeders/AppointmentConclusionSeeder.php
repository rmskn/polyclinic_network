<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentConclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_conclusions')->insert([
            'app_id' => 1,
            'title' => 'Conclusion 1',
            'description' => 'Good!'
        ]);

        DB::table('appointment_conclusions')->insert([
            'app_id' => 2,
            'title' => 'Conclusion 2',
            'description' => 'Not good!'
        ]);
    }
}
