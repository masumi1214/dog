<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('name'); // 犬の名前
            $table->foreignId('user_id')->constrained('users'); // 飼い主ID
            $table->date('birthday'); // 誕生日
            $table->string('breed'); // 犬種
            $table->boolean('neutered'); // 去勢済みかどうか
            $table->enum('gender', ['male', 'female']); // 性別
            $table->enum('diet_type', ['dog_food', 'homemade', 'mixed']); // 食事タイプ
            $table->boolean('pregnant')->nullable(); // 妊娠しているかどうか
            $table->text('allergies')->nullable(); // アレルギー情報

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dogs');
    }
}
