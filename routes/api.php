<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)->parameters([
    'products' => 'id'
]);

Route::post('products/with-form-request', [ProductController::class, 'storeWithFormRequest']);
