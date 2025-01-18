<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        // 既存のデータを削除
        Ingredient::truncate();

        $ingredients = [
            [
                'name' => '鶏むね肉',
                'calories' => 110,
                'protein' => 23.3,
                'fat' => 1.9,
                'carbohydrates' => 0.0,
                'fiber' => 0.0,
                'calcium' => 5.0,
                'iron' => 0.3,
                'vitamin_a' => 30,
                'vitamin_c' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '鶏もも肉',
                'calories' => 146,
                'protein' => 17.8,
                'fat' => 8.2,
                'carbohydrates' => 0.0,
                'fiber' => 0.0,
                'calcium' => 5.0,
                'iron' => 0.4,
                'vitamin_a' => 35,
                'vitamin_c' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ブロッコリー',
                'calories' => 34,
                'protein' => 2.8,
                'fat' => 0.4,
                'carbohydrates' => 6.6,
                'fiber' => 3.0,
                'calcium' => 45.0,
                'iron' => 0.8,
                'vitamin_a' => 540,
                'vitamin_c' => 120,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'りんご',
                'calories' => 57,
                'protein' => 0.2,
                'fat' => 0.1,
                'carbohydrates' => 14.4,
                'fiber' => 1.8,
                'calcium' => 3.0,
                'iron' => 0.1,
                'vitamin_a' => 4,
                'vitamin_c' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // バルクインサートを使用
        Ingredient::insert($ingredients);
    }
}

