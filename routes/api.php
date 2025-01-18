<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IngredientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 食材関連のルート
// 注意: 順序が重要です。より具体的なルートを先に定義します。
Route::get('/ingredients/search', [IngredientController::class, 'search']);  // 検索ルート
Route::get('/ingredients/{id}', [IngredientController::class, 'show']);      // 個別アイテムの取得
Route::get('/ingredients', [IngredientController::class, 'index']);          // 一覧の取得

