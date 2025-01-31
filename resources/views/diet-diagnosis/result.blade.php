@extends('layouts.app')
@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ダイエット診断') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <!-- 体重診断結果 -->
                    <h2 class="text-2xl font-bold mb-2">体重診断結果</h2>
                    <p class="text-gray-600 mb-6">現在の状態と推奨される対策をご確認ください</p>

                    <div class="grid grid-cols-2 gap-8 mb-8">
                        <div>
                            <p class="text-gray-600">現在の体重</p>
                            <p class="text-4xl font-bold">{{ $dietPlan['current_weight'] }} kg</p>
                        </div>
                        <div>
                            <p class="text-gray-600">理想体重</p>
                            <p class="text-4xl font-bold">{{ $dietPlan['ideal_weight'] }} kg</p>
                        </div>
                    </div>

                    <!-- 推奨事項 -->
                    <h3 class="text-xl font-bold mb-4">推奨事項</h3>
                    
                    <div class="space-y-6 mb-8">
                        <div>
                            <p class="text-gray-600">推奨タイプ</p>
                            <p class="text-2xl font-bold">減量プログラム</p>
                        </div>

                        <div>
                            <p class="text-gray-600">1日の推奨カロリー</p>
                            <p class="text-2xl font-bold">145 kcal</p>
                        </div>

                        <div>
                            <p class="text-gray-600">運動レベル</p>
                            <p class="text-2xl font-bold">現在の運動量を25%増加</p>
                        </div>
                    </div>

                    <!-- 食事プラン -->
                    <h3 class="text-xl font-bold mb-4">食事プラン</h3>
                    <ul class="list-disc list-inside space-y-2 mb-8">
                        <li>食事回数を1日2-3回に分けて与える</li>
                        <li>食事の30分前に少量の水を与える</li>
                        <li>食物繊維が豊富な野菜を取り入れる</li>
                        <li>おやつは全体の10%以下に制限</li>
                    </ul>

                    <!-- 警告 -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <ul class="list-disc list-inside text-sm text-yellow-700">
                                    <li>急激な減量は健康上のリスクがあります</li>
                                    <li>月に体重の5%以上の減量は避けてください</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- ナビゲーションボタン -->
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('dog-dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            TOPページへ戻る
                        </a>
                        <a href="{{ route('dog_profiles.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            プロフィール編集
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  @endsection