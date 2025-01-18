<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Session;

class RecipeController extends Controller
{
    public function create()
    {
        // セッションから保存された食材を取得
        $ingredients = Session::get('recipe_ingredients', []);
        return view('recipe.new', compact('ingredients'));
    }

    public function addIngredient(Request $request)
    {
        $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // セッションから既存の食材を取得
        $ingredients = Session::get('recipe_ingredients', []);

        // 新しい食材を追加
// Ingredientモデルから栄養素情報を取得
$ingredient = Ingredient::where('name', $request->ingredient_name)->first();

        // 新しい食材を追加
        $ingredients[] = [
            'name' => $request->ingredient_name,
            'amount' => $request->amount,
            'protein' => $ingredient->protein,
            'fat' => $ingredient->fat,
            'carbohydrates' => $ingredient->carbohydrates,
            'fiber' => $ingredient->fiber,
            'calcium' => $ingredient->calcium,
            'iron' => $ingredient->iron,
            'vitamin_a' => $ingredient->vitamin_a,
            'vitamin_c' => $ingredient->vitamin_c,
        ];
        // セッションに保存
        Session::put('recipe_ingredients', $ingredients);

        return redirect()->route('recipe.new')->with('success', '食材を追加しました');
    }

    public function removeIngredient(Request $request)
    {
        $index = $request->index;
        $ingredients = Session::get('recipe_ingredients', []);
        
        if (isset($ingredients[$index])) {
            unset($ingredients[$index]);
            $ingredients = array_values($ingredients); // インデックスを振り直す
        }

        Session::put('recipe_ingredients', $ingredients);
        return redirect()->route('recipe.new');
    }

    public function resetIngredients()
    {
        Session::forget('recipe_ingredients');
        return redirect()->route('recipe.new');
    }

    public function tempSave(Request $request)
    {
        // セッションに保存
        Session::put('recipe_name' ,$request->recipe_name);
        return redirect()->route('recipe_name');

        // 途中保存の処理（今回は省略）
        return redirect()->route('recipe.new')->with('success', 'レシピを途中保存しました');
    }
}

