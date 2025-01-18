<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDogProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:100',
            'age_years' => 'required|integer|min:0',
            'age_months' => 'required|integer|min:0|max:11',
            'weight' => 'required|numeric|min:0',
            'activity_level' => 'required|in:低い,普通,高い,非常に高い',
            'life_stage' => 'required|in:子犬,成犬,シニア',
            'body_condition' => 'required|in:痩せ気味,標準,太り気味,肥満',
            'is_neutered' => 'boolean',
            'food_type' => 'required|in:ドライフード,ウェットフード,生食,手作り食,混合',
            'allergies' => 'nullable|array',
            'allergies.*' => 'string'
        ];
    }
}