<?php

namespace App\Http\Controllers;

use App\Models\DogProfile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDogProfileRequest;

class DogProfileController extends Controller
{
    public function create()
    {
        $breeds = [
            '柴犬' => '柴犬',
            'トイプードル' => 'トイプードル',
            'チワワ' => 'チワワ',
            'ポメラニアン' => 'ポメラニアン',
            'ゴールデンレトリバー' => 'ゴールデンレトリバー',
            'ラブラドールレトリバー' => 'ラブラドールレトリバー',
            'ミニチュアダックスフンド' => 'ミニチュアダックスフンド',
            'フレンチブルドッグ' => 'フレンチブルドッグ',
            'コーギー' => 'コーギー',
            'その他' => 'その他'
        ];

        $activityLevels = [
            '低い' => '低い - ほとんど運動しない',
            '普通' => '普通 - 1日1回の散歩程度',
            '高い' => '高い - 1日2回以上の散歩や活発な遊び',
            '非常に高い' => '非常に高い - 長時間の運動や激しい活動'
        ];

        $lifeStages = [
            '子犬' => '子犬',
            '成犬' => '成犬',
            'シニア' => 'シニア'
        ];

        $bodyConditions = [
            '痩せ気味' => '痩せ気味 - 理想体重より少し軽い',
            '標準' => '標準 - 理想的な体重',
            '太り気味' => '太り気味 - 理想体重より少し重い',
            '肥満' => '肥満 - 明らかに過体重'
        ];

        $foodTypes = [
            'ドライフード' => 'ドライフード',
            'ウェットフード' => 'ウェットフード',
            '生食' => '生食',
            '手作り食' => '手作り食',
            '混合' => '混合'
        ];

        $allergies = [
            '牛肉' => '牛肉',
            '鶏肉' => '鶏肉',
            '豚肉' => '豚肉',
            '魚' => '魚',
            '卵' => '卵',
            '乳製品' => '乳製品',
            '小麦' => '小麦',
            '大豆' => '大豆',
            'とうもろこし' => 'とうもろこし'
        ];

        return view('dog_profiles.create', compact(
            'breeds',
            'activityLevels',
            'lifeStages',
            'bodyConditions',
            'foodTypes',
            'allergies'
        ));
    }

    public function store(StoreDogProfileRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        // アレルギー情報を配列として保存
        if (isset($validatedData['allergies'])) {
            $validatedData['allergies'] = json_encode($validatedData['allergies']);
        } else {
            $validatedData['allergies'] = json_encode([]);
        }

        $dogProfile = DogProfile::create($validatedData);

        return redirect()->route('dog_profiles.show', $dogProfile)
            ->with('success', 'プロフィールが正常に保存されました。');
    }

    public function show(DogProfile $dogProfile)
    {
        $this->authorize('view', $dogProfile);

        // アレルギー情報を配列に戻す
        $dogProfile->allergies = json_decode($dogProfile->allergies, true);

        return view('dog_profiles.show', compact('dogProfile'));
    }
}

