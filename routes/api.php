<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function(){

// });

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('products', ProductController::class)->parameters([
    'products' => 'id'
    ]);

    Route::post('auth/logout', [AuthController::class, 'logout']);
});



Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::post('products/with-form-request', [ProductController::class, 'storeWithFormRequest']);
