<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ingredients', function (Blueprint $table) {
            // 既存のカラムは追加しない
            if (!Schema::hasColumn('ingredients', 'fiber')) {
                $table->float('fiber')->nullable()->after('carbohydrates');
            }
            if (!Schema::hasColumn('ingredients', 'calcium')) {
                $table->float('calcium')->nullable()->after('fiber');
            }
            if (!Schema::hasColumn('ingredients', 'iron')) {
                $table->float('iron')->nullable()->after('calcium');
            }
            if (!Schema::hasColumn('ingredients', 'vitamin_a')) {
                $table->float('vitamin_a')->nullable()->after('iron');
            }
            if (!Schema::hasColumn('ingredients', 'vitamin_c')) {
                $table->float('vitamin_c')->nullable()->after('vitamin_a');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropColumn([
                'fiber',
                'calcium',
                'iron',
                'vitamin_a',
                'vitamin_c'
            ]);
        });
    }
};

