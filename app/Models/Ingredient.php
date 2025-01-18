<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'protein',
        'fat',
        'carbohydrates',
        'fiber',
        'calcium',
        'iron',
        'vitamin_a',
        'vitamin_c',
    ];
}