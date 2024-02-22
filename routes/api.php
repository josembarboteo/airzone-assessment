<?php

use Airzone\Infraestructure\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('')->group(function() {
    Route::prefix('/categories')->group(function() {
        Route::get('', [CategoriesController::class, 'list']);
        Route::post('', [CategoriesController::class, 'create']);
        Route::put('/{categoryId}', [CategoriesController::class, 'update']);
        Route::delete('/{categoryId}', [CategoriesController::class, 'delete']);
    });
});
