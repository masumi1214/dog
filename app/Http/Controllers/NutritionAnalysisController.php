<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Session;

class NutritionAnalysisController extends Controller
{
    public function show()
{
    // セッションから栄養分析結果を取得
    $nutritionAnalysis =  Session::get('recipe_ingredients', []);
    $recipe = Session::get('recipe_name', []);

    // 栄養分析結果がない場合は、入力フォームにリダイレクト
    if (!$nutritionAnalysis) {
        return redirect()->route('recipe.new')->with('error', '栄養分析結果がありません。再度入力してください。');
    }

    return view('nutrition.analysis', [
        'recipe' => $recipe,
        'nutritionAnalysis' => $nutritionAnalysis,
    ]);
}
public function analyze(Request $request)
{
    $validatedData = $request->validate([
        'recipe_name' => 'required|string|max:255',
        'servings' => 'required|integer|min:1|max:10',
        'ingredients' => 'required|array|min:1',
        'ingredients.*.name' => 'required|string|max:255',
        'ingredients.*.amount' => 'required|numeric|min:0',
    ]);

    $nutritionAnalysis = $this->calculateNutrition($validatedData['ingredients']);

    // セッションに結果を保存
    session(['nutritionAnalysis' => $nutritionAnalysis, 'recipe' => $validatedData]);

    return redirect()->route('nutrition.show');

    }

    private function calculateNutrition($ingredients)
    {
        $totalNutrition = [
            'calories' => 0,
            'protein' => 0,
            'fat' => 0,
            'carbohydrates' => 0,
            'fiber' => 0,
            'calcium' => 0,
            'iron' => 0,
            'vitamin_a' => 0,
            'vitamin_c' => 0,
        ];

        foreach ($ingredients as $ingredient) {
            $dbIngredient = Ingredient::where('name', $ingredient['name'])->first();
            if ($dbIngredient) {
                $ratio = $ingredient['amount'] / 100; // データベースの栄養価は100gあたりで保存されていると仮定
                foreach ($totalNutrition as $nutrient => $value) {
                    $totalNutrition[$nutrient] += $dbIngredient->$nutrient * $ratio;
                }
            }
        }

        return $totalNutrition;
    }
}