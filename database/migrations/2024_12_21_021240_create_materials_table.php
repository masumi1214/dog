<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('name'); // 食材名
            $table->string('unit'); // 単位
            $table->decimal('nutrient_1', 8, 2)->nullable(); // 栄養素1
            $table->decimal('nutrient_2', 8, 2)->nullable(); // 栄養素2
            // 必要に応じて nutrient_3 〜 nutrient_20 を追加

            $table->timestamps(); // 作成日・更新日
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
