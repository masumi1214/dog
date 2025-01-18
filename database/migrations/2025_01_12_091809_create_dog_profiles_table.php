<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('dog_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 255);
            $table->string('breed', 100);
            $table->integer('age_years');
            $table->integer('age_months');
            $table->decimal('weight', 5, 2);
            $table->enum('activity_level', ['低い', '普通', '高い', '非常に高い']);
            $table->enum('life_stage', ['子犬', '成犬', 'シニア']);
            $table->enum('body_condition', ['痩せ気味', '標準', '太り気味', '肥満']);
            $table->boolean('is_neutered')->default(false);
            $table->enum('food_type', ['ドライフード', 'ウェットフード', '生食', '手作り食', '混合']);
            $table->json('allergies')->nullable();
            $table->timestamps();

            $table->index('name');
            $table->index('breed');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dog_profiles');
    }
}