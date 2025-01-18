<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IngredientController extends Controller
{
    /**
     * 食材を検索
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('query');
        
        if (empty($query)) {
            return response()->json([
                'success' => false,
                'message' => '検索キーワードを入力してください。'
            ], 400);
        }

        $ingredients = Ingredient::select([
            'id',
            'name',
            'calories',
            'protein',
            'fat',
            'carbohydrates',
            'fiber',
            'calcium',
            'iron',
            'vitamin_a',
            'vitamin_c'
        ])
        ->where('name', 'like', "%{$query}%")
        ->get();

        if ($ingredients->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => '該当する食材が見つかりませんでした。'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $ingredients
        ], 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'X-Content-Type-Options' => 'nosniff'
        ])->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    // 他のメソッドは変更なし
}

