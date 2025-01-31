@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $dogProfile->name }}のプロフィール</h1>

                <div class="space-y-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">基本情報</h2>
                        <div class="mt-2 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">犬種</p>
                                <p class="font-medium">{{ $dogProfile->breed }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">年齢</p>
                                <p class="font-medium">{{ $dogProfile->age_years }}歳 {{ $dogProfile->age_months }}ヶ月</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">体重</p>
                                <p class="font-medium">{{ $dogProfile->weight }}kg</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">活動レベル</p>
                                <p class="font-medium">{{ $dogProfile->activity_level }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">ライフステージ</p>
                                <p class="font-medium">{{ $dogProfile->life_stage }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">体型</p>
                                <p class="font-medium">{{ $dogProfile->body_condition }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">避妊・去勢済み</p>
                                <p class="font-medium">{{ $dogProfile->is_neutered ? 'はい' : 'いいえ' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">主な食事タイプ</p>
                                <p class="font-medium">{{ $dogProfile->food_type }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">アレルギー情報</h2>
                        @if(!empty($dogProfile->allergies) && is_array($dogProfile->allergies) && count($dogProfile->allergies) > 0)
                            <ul class="mt-2 list-disc list-inside">
                                @foreach($dogProfile->allergies as $allergy)
                                    <li class="text-gray-600">{{ $allergy }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-2 text-gray-600">登録されているアレルギーはありません。</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-8 px-4 py-5 sm:px-6">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('recipe.new') }}" 
                        class="flex justify-center items-center bg-black hover:bg-gray-800 text-white px-4 py-3 rounded-md text-sm font-medium">
                        食材入力
                    </a>
                    <a href="{{ route('nutrition.show') }}" 
                        class="flex justify-center items-center bg-black hover:bg-gray-800 text-white px-4 py-3 rounded-md text-sm font-medium">
                        栄養過不足診断
                    </a>
                    <a href="{{ route('diet-diagnosis.show') }}" 
                        class="flex justify-center items-center bg-black hover:bg-gray-800 text-white px-4 py-3 rounded-md text-sm font-medium">
                        ダイエット診断
                    </a>
                    <a href="{{ route('dog_profiles.create', Auth::user()->dogProfile->id) }}" 
                        class="flex justify-center items-center bg-white border border-gray-300 hover:bg-gray-50 text-black px-4 py-3 rounded-md text-sm font-medium">
                        プロフィール編集
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

