<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 他のシーダーを呼び出す場合もここに追加
        $this->call(MaterialsSeeder::class);
    }
}
