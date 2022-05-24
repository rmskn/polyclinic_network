<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            'title' => 'Therapy',
            'description' => 'Therapy specialization description',
        ]);

        DB::table('specializations')->insert([
            'title' => 'Gastroenterology',
            'description' => 'Gastroenterology specialization description',
        ]);
    }
}
