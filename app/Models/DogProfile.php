<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DogProfile extends Model
{
    protected $fillable = [
        'user_id', 'name', 'breed', 'age_years', 'age_months', 'weight',
        'activity_level', 'life_stage', 'body_condition',
        'is_neutered', 'food_type', 'allergies'
    ];

    protected $casts = [
        'is_neutered' => 'boolean',
        'allergies' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}