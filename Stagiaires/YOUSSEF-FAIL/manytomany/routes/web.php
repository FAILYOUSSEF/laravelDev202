<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => redirect()->route('products.index'));

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
