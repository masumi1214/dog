<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('materials')->insert([
            ['name' => 'Chicken', 'unit' => 'g', 'nutrient_1' => 25.0, 'nutrient_2' => 0.8],
            ['name' => 'Rice', 'unit' => 'g', 'nutrient_1' => 6.8, 'nutrient_2' => 0.1],
        ]);
    }
}
