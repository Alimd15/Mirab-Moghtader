<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductsController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('home.privacy');
Route::get('/error', [HomeController::class, 'error'])->name('home.error');

// Store routes
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/details/{id}', [StoreController::class, 'details'])->name('store.details');

// Admin Products routes (matching /Admin/Products/{action}/{id?})
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('index');
    Route::get('/create', [ProductsController::class, 'create'])->name('create');
    Route::post('/store', [ProductsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductsController::class, 'destroy'])->name('delete');
}); 