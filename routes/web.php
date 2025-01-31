<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\NutritionAnalysisController;
use App\Http\Controllers\DietDiagnosisController;
use App\Http\Controllers\DogDashboardController;
use App\Http\Controllers\DogProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// ホームページ
Route::get('/', [HomeController::class, 'index'])->name('home');

// 認証不要のルート
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証が必要なルート
Route::middleware(['auth'])->group(function () {
    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 材料データ登録
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');

    // レシピ関連
    Route::get('/recipe/new', [RecipeController::class, 'create'])->name('recipe.new');
    Route::post('/recipe/add-ingredient', [RecipeController::class, 'addIngredient'])->name('recipe.add-ingredient');
    Route::delete('/recipe/remove-ingredient', [RecipeController::class, 'removeIngredient'])->name('recipe.remove-ingredient');
    Route::post('/recipe/reset', [RecipeController::class, 'resetIngredients'])->name('recipe.reset');
    Route::post('/recipe/temp-save', [RecipeController::class, 'tempSave'])->name('recipe.temp-save');
    Route::get('/api/ingredients', [RecipeController::class, 'search']);

    // 栄養分析関連
    Route::post('/nutrition-analysis', [NutritionAnalysisController::class, 'analyze'])->name('nutrition.analyze');
    Route::get('/nutrition-analysis', [NutritionAnalysisController::class, 'show'])->name('nutrition.show');

    // ダイエット診断
    Route::get('/diet-diagnosis', [DietDiagnosisController::class, 'show'])->name('diet-diagnosis.show');

    // ダッシュボード
    Route::get('/dog-dashboard', [DogDashboardController::class, 'index'])->name('dog-dashboard');

    // 犬のプロフィール関連
    Route::get('/dog-profiles/create', [DogProfileController::class, 'create'])->name('dog_profiles.create');
    Route::post('/dog-profiles', [DogProfileController::class, 'store'])->name('dog_profiles.store');
    Route::get('/dog-profiles/{dogProfile}', [DogProfileController::class, 'show'])->name('dog_profiles.show');
    Route::get('/dog-profile/{dogProfile}/edit', [DogProfileController::class, 'edit'])->name('dog_profile.edit');

    // 分析結果
    Route::get('/analyses', [AnalysisController::class, 'index'])->name('analyses.index');
    Route::get('/analyses/{analysis}', [AnalysisController::class, 'show'])->name('analyses.show');
    
    // 設定
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';

// 既存のルートに追加
Route::middleware(['auth'])->group(function () {
    Route::get('/recipe/new', [RecipeController::class, 'create'])->name('recipe.new');
    Route::post('/recipe/add-ingredient', [RecipeController::class, 'addIngredient'])->name('recipe.add-ingredient');
    Route::delete('/recipe/remove-ingredient', [RecipeController::class, 'removeIngredient'])->name('recipe.remove-ingredient');
    Route::post('/recipe/reset', [RecipeController::class, 'resetIngredients'])->name('recipe.reset');
    Route::post('/recipe/temp-save', [RecipeController::class, 'tempSave'])->name('recipe.temp-save');
});
