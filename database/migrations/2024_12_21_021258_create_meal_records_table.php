<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('meal_records', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->foreignId('dog_id')->constrained('dogs'); // 犬のID
            $table->foreignId('material_id')->constrained('materials'); // 食材ID
            $table->decimal('quantity', 8, 2); // 分量
            $table->timestamp('fed_at'); // 給餌日時

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_records');
    }
}
