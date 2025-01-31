@extends('layouts.app')
@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('愛犬ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($dogProfile))
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold mb-4">{{ $dogProfile->name }}のプロフィール</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div><strong>犬種:</strong> {{ $dogProfile->breed }}</div>
                                <div><strong>年齢:</strong> {{ $dogProfile->age }}歳 {{ $dogProfile->age_months }}ヶ月</div>
                                <div><strong>体重:</strong> {{ $dogProfile->weight }}kg</div>
                                <div><strong>活動レベル:</strong> {{ $dogProfile->activity_level }}</div>
                                <div><strong>ライフステージ:</strong> {{ $dogProfile->life_stage }}</div>
                                <div><strong>体型:</strong> {{ $dogProfile->body_condition }}</div>
                                <div><strong>避妊・去勢:</strong> {{ $dogProfile->is_neutered ? 'はい' : 'いいえ' }}</div>
                                <div><strong>主な食事タイプ:</strong> {{ $dogProfile->food_type }}</div>
                                <div class="col-span-2"><strong>アレルギー:</strong> {{ $dogProfile->allergies ?: 'なし' }}</div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-gray-600 mb-4">プロフィールが登録されていません。</p>
                            <a href="{{ route('dog_profiles.create') }}" class="text-blue-600 hover:underline">
                                プロフィールを登録する
                            </a>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                        <a href="{{ route('recipe.new') }}" class="block">
                            <div class="p-6 bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                <h3 class="text-lg font-semibold mb-2">食材入力</h3>
                                <p class="text-gray-600">食材を入力して栄養バランスを確認</p>
                            </div>
                        </a>

                        <a href="{{ route('nutrition.analyze') }}" class="block">
                            <div class="p-6 bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                <h3 class="text-lg font-semibold mb-2">栄養分析履歴</h3>
                                <p class="text-gray-600">過去の栄養分析結果を確認</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  @endsection