<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('weight_histories', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->foreignId('dog_id')->constrained('dogs'); // 犬のID
            $table->decimal('weight', 5, 2); // 体重
            $table->timestamp('recorded_at'); // 記録日時

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weight_histories');
    }
}
