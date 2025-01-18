@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">分析結果詳細</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <h2 class="text-2xl font-semibold mb-4">{{ $analysis->title }}</h2>
        <p class="text-gray-600 mb-4">分析日: {{ $analysis->created_at->format('Y/m/d H:i') }}</p>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">栄養成分</h3>
            <ul class="list-disc pl-5">
                <li>タンパク質: {{ $analysis->protein }}g</li>
                <li>脂質: {{ $analysis->fat }}g</li>
                <li>炭水化物: {{ $analysis->carbohydrate }}g</li>
                <!-- 他の栄養成分も同様に表示 -->
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">コメント</h3>
            <p class="text-gray-700">{{ $analysis->comment }}</p>
        </div>

        <a href="{{ route('analyses.index') }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">&larr; 一覧に戻る</a>
    </div>
</div>
@endsection

