<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DietDiagnosisController extends Controller
{
    public function show()
    {
        // 静的なデータを返す
        $dietPlan = [
            'current_weight' => 4.0,
            'ideal_weight' => 2.8,
            'recommendation_type' => '減量プログラム',
            'daily_calories' => 145,
            'exercise_level' => '現在の運動量を25%増加',
            'meal_plan' => [
                '食事回数を1日2-3回に分けて与える',
                '食事の30分前に少量の水を与える',
                '食物繊維が豊富な野菜を取り入れる',
                'おやつは全体の10%以下に制限'
            ],
            'warnings' => [
                '急激な減量は健康上のリスクがあります',
                '月に体重の5%以上の減量は避けてください'
            ]
        ];

        return view('diet-diagnosis.result', compact('dietPlan'));
    }
}