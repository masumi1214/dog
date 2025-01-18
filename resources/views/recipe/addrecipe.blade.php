@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">保存された栄養分析</h1>

                <div class="mb-6">
                    <label for="recipe_name" class="block text-sm font-medium text-gray-700 mb-2">レシピ名</label>
                    <input type="text" id="recipe_name" name="recipe_name" value="{{ old('recipe_name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="serving" class="block text-sm font-medium text-gray-700 mb-2">何食分</label>
                    <select id="serving" name="serving"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="1">1食分</option>
                        <option value="2">2食分</option>
                        <option value="3">3食分</option>
                        <option value="4">4食分</option>
                    </select>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">食材入力</h2>
                    <form action="{{ route('recipe.add-ingredient') }}" method="POST" class="flex gap-4 mb-4">
                        @csrf
                        <div class="flex-1">
                            <input type="text" name="ingredient_name" placeholder="食材名"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="w-32">
                            <input type="number" name="amount" placeholder="使用量(g)"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            追加
                        </button>
                    </form>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">確定済み食材</h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">食材名</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">使用量(G)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(Session::get('recipe_ingredients', []) as $index => $ingredient)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $ingredient['name'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ingredient['amount'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <form action="{{ route('recipe.remove-ingredient') }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="index" value="{{ $index }}">
                                                <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <form action="{{ route('recipe.reset') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            リセットする
                        </button>
                    </form>
                    <div class="space-x-4">
                        <form action="{{ route('recipe.temp-save') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                途中保存する
                            </button>
                        </form>
                        <a href="{{ route('nutrition.show') }}"
                            class="inline-block bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                            栄養素計算へ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

