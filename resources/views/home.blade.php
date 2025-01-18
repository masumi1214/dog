@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">ワンちゃんの栄養管理アプリへようこそ</h1>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-4">主な機能：</h2>
        <ul class="list-disc pl-5">
            @foreach($features as $feature)
                <li class="mb-2">{{ $feature }}</li>
            @endforeach
        </ul>
    </div>
    
    <div class="mt-8">
        <a href="{{ route('dog_profiles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            プロフィール作成
        </a>
    </div>
</div>
@endsection