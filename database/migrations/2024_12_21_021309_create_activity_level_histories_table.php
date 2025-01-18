<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLevelHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('activity_level_histories', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->foreignId('dog_id')->constrained('dogs'); // 犬のID
            $table->string('activity_level'); // 活動レベル
            $table->timestamp('recorded_at'); // 記録日時

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_level_histories');
    }
}
