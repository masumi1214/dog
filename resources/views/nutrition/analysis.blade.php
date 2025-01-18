@extends('layouts.app')
@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('栄養計算結果') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">{{ $recipe }} </h3>

                    <div class="mb-8">
                        <h4 class="text-md font-medium text-gray-700 mb-2">使用食材</h4>
                        <ul class="list-disc list-inside">
                            @foreach( $nutritionAnalysis as $ingredient)
                                <li>{{ $ingredient['name'] }} - {{ $ingredient['amount'] }}g</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-gray-100 rounded-lg p-6">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">栄養分析結果</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($nutritionAnalysis as $ingredient)
                                @foreach ($ingredient as $nutrient => $value)
                                    <div class="bg-white rounded-lg p-4 shadow">
                                        <p class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $nutrient)) }}</p>
                                        <p class="text-2xl font-bold text-gray-900">
                                            {{ $value }}
                                            @if ($nutrient === 'calories')
                                                kcal
                                            @elseif(in_array($nutrient, ['vitamin_a', 'vitamin_c']))
                                                μg
                                            @else
                                                g
                                            @endif
                                        </p>
                        </div>
                        @endforeach
                    @endforeach                       
                    </div>
                    </div>

                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('recipe.new') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            新しいレシピを作成
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection