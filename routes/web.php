<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::redirect('/', '/products');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products/register', [ProductController::class, 'create'])->name('products.register');
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}', [ProductController::class, 'edit'])->name('products.detail');
Route::post('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
