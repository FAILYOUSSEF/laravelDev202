<?php

// ============================================================
//  Routes: web.php
//
//  All the URLs (routes) for our e-commerce platform.
//  resource() creates all 7 CRUD routes automatically:
//
//  GET    /categories          → index   (list all)
//  GET    /categories/create   → create  (show form)
//  POST   /categories          → store   (save new)
//  GET    /categories/{id}     → show    (view one)
//  GET    /categories/{id}/edit→ edit    (show edit form)
//  PUT    /categories/{id}     → update  (save edits)
//  DELETE /categories/{id}     → destroy (delete)
// ============================================================

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Home page — redirect to products list
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource routes for Categories
Route::resource('categories', CategoryController::class);

// Resource routes for Products
Route::resource('products', ProductController::class);
