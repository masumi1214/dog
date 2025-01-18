<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials'; // テーブル名

    // テーブル名を追加
    protected $fillable = [
        'name',
        'unit',
        'nutrient_1',
        'nutrient_2',
    ];
}
