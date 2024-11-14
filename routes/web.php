<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

#category section 

Route::get('/add/category', [CategoryController::class, 'create'])->name('add.category');
Route::POST('/store/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/category/list', [CategoryController::class, 'index'])->name('category.list');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
Route::POST('/update/category/{id}', [CategoryController::class, 'update'])->name('update.category');


#product Section
Route::get('/add/product', [ProductController::class, 'create'])->name('add.product');
Route::POST('/store/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
Route::get('/delete/product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::POST('/update/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');



