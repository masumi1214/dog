<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id()->comment('主キー、自動増分');
            $table->string('name')->unique()->comment('食材名（一意）');
            $table->float('calories')->comment('カロリー (kcal/100g)');
            $table->float('protein')->comment('タンパク質 (g/100g)');
            $table->float('fat')->comment('脂質 (g/100g)');
            $table->float('carbohydrates')->comment('炭水化物 (g/100g)');
            $table->float('fiber')->comment('食物繊維 (g/100g)');
            $table->float('calcium')->comment('カルシウム (mg/100g)');
            $table->float('iron')->comment('鉄分 (mg/100g)');
            $table->float('vitamin_a')->comment('ビタミンA (μg/100g)');
            $table->float('vitamin_c')->comment('ビタミンC (mg/100g)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}