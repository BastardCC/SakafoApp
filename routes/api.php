<?php

use App\Http\Controllers\PlateController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ContainController;
use App\Http\Controllers\WeekContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Plates
Route::get('/plates', [PlateController::class, 'index']);
Route::post('/plates', [PlateController::class, 'store']);
Route::get('/plates/{plate_id}', [PlateController::class, 'show']);
Route::post('/plates/{plate_id}', [PlateController::class, 'update']);
Route::delete('/plates/{plate_id}', [PlateController::class, 'delete']);

//Ingredients
Route::get('/ingredients', [IngredientController::class, 'index']);
Route::post('/ingredients', [IngredientController::class, 'store']);
Route::get('/ingredients/{ingredient_id}', [IngredientController::class, 'show']);
Route::post('/ingredients/{ingredient_id}', [IngredientController::class, 'update']);
Route::delete('/ingredients/{ingredient_id}', [IngredientController::class, 'delete']);

//Contains
Route::get('/contains', [ContainController::class, 'index']);
Route::post('/contains', [ContainController::class, 'store']);
Route::get('/contains/{plate_id}/{ingredient_id}', [ContainController::class, 'show']);
Route::post('/contains/{plate_id}/{ingredient_id}', [ContainController::class, 'update']);
Route::delete('/contains/{plate_id}/{ingredient_id}', [ContainController::class, 'delete']);

Route::get('/weeks', [WeekContainer::class, 'index']);
Route::post('/weeks', [WeekContainer::class, 'store']);
Route::get('/weeks/{week_id}', [WeekContainer::class, 'show']);
Route::post('/weeks/{week_id}', [WeekContainer::class, 'update']);
Route::delete('/weeks/{week_id}', [WeekContainer::class, 'delete']);
Route::delete('/weeks/{week_id}', [WeekContainer::class, 'aaa']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
