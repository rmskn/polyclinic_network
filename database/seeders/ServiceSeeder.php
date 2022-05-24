<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'spec_id' => 1,
            'title' => 'Consultation',
            'description' => 'Consultation description',
            'price' => 1000,
            'duration' => 10
        ]);

        DB::table('services')->insert([
            'spec_id' => 2,
            'title' => 'Endoscopy',
            'description' => 'Endoscopy description',
            'price' => 2000,
            'duration' => 20
        ]);

        DB::table('services')->insert([
            'spec_id' => 2,
            'title' => 'Consultation',
            'description' => 'Consultation description',
            'price' => 7000,
            'duration' => 10
        ]);
    }
}
