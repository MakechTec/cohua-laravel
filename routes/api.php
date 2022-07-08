<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
        ->get('/user', function (Request $request) {
            return $request->user();
        });


Route::resource('/products', ProductController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);

Route::resource('/cart', CartController::class)
        ->only(['index', 'store', 'show', 'destroy']);

Route::post('/cart/{id}/add-item', [CartController::class,'addItem']);
Route::delete('/cart/{id}/remove-item/{productId}', [CartController::class,'removeItem']);
Route::get('/cart/{id}/single-item/{productId}', [CartController::class,'singleItem']);