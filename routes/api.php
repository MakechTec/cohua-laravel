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

Route::resource('/carts', CartController::class)
        ->only(['index', 'store', 'show', 'destroy']);

Route::post('/carts/{id}/add-item', [CartController::class,'addItem'])->name('cart.add-item');
Route::delete('/carts/{id}/remove-item/{productId}', [CartController::class,'removeItem'])->name('cart.remove-item');
Route::get('/carts/{id}/single-item/{productId}', [CartController::class,'singleItem'])->name('cart.single-item');