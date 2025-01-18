@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">愛犬プロフィール登録</h1>

    <form method="POST" action="{{ route('dog_profiles.store') }}" class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        @csrf
        <div class="p-6 space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">愛犬の名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="breed" class="block text-sm font-medium text-gray-700">犬種</label>
                <select name="breed" id="breed" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">犬種を選択</option>
                    @foreach($breeds as $key => $value)
                        <option value="{{ $key }}" {{ old('breed') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('breed')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="age_years" class="block text-sm font-medium text-gray-700">年齢（年）</label>
                    <input type="number" name="age_years" id="age_years" value="{{ old('age_years') }}" required min="0"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('age_years')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="age_months" class="block text-sm font-medium text-gray-700">月齢（0-11）</label>
                    <input type="number" name="age_months" id="age_months" value="{{ old('age_months') }}" required min="0" max="11"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('age_months')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="weight" class="block text-sm font-medium text-gray-700">体重 (kg)</label>
                <input type="number" name="weight" id="weight" value="{{ old('weight') }}" required step="0.1" min="0"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('weight')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="activity_level" class="block text-sm font-medium text-gray-700">活動レベル</label>
                <select name="activity_level" id="activity_level" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">活動レベルを選択</option>
                    @foreach($activityLevels as $key => $value)
                        <option value="{{ $key }}" {{ old('activity_level') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('activity_level')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="life_stage" class="block text-sm font-medium text-gray-700">ライフステージ</label>
                <select name="life_stage" id="life_stage" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">ライフステージを選択</option>
                    @foreach($lifeStages as $key => $value)
                        <option value="{{ $key }}" {{ old('life_stage') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('life_stage')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body_condition" class="block text-sm font-medium text-gray-700">体型</label>
                <select name="body_condition" id="body_condition" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">体型を選択</option>
                    @foreach($bodyConditions as $key => $value)
                        <option value="{{ $key }}" {{ old('body_condition') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('body_condition')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input type="checkbox" name="is_neutered" id="is_neutered" value="1" {{ old('is_neutered') ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                </div>
                <div class="ml-3 text-sm">
                    <label for="is_neutered" class="font-medium text-gray-700">避妊・去勢済み</label>
                    <p class="text-gray-500">愛犬が避妊・去勢手術を受けている場合はチェックしてください。</p>
                </div>
            </div>

            <div>
                <label for="food_type" class="block text-sm font-medium text-gray-700">主な食事タイプ</label>
                <select name="food_type" id="food_type" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">食事タイプを選択</option>
                    @foreach($foodTypes as $key => $value)
                        <option value="{{ $key }}" {{ old('food_type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('food_type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">アレルギー</label>
                <p class="text-sm text-gray-500 mb-2">愛犬が持っているアレルギーをすべて選択してください。</p>
                <div class="space-y-2">
                    @foreach($allergies as $key => $value)
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" name="allergies[]" id="allergy_{{ $key }}" value="{{ $key }}"
                                    {{ in_array($key, old('allergies', [])) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="allergy_{{ $key }}" class="font-medium text-gray-700">{{ $value }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('allergies')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                プロフィールを保存
            </button>
        </div>
    </form>
</div>
@endsection

