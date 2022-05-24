<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analyzes')->insert([
            'app_items_id' => 1,
            'options' => json_encode(['hemoglobin' => 15, 'leukocytes' => 12], JSON_THROW_ON_ERROR),
            'title' => 'General blood analysis',
            'description' => 'analysis desc'
        ]);
    }
}
