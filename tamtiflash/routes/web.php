<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/shopdetail/{id}', [ShopController::class, 'shop_detail']);
Route::get('/cart', [ShopController::class, 'cart']);
Route::get('/productdetail/{id}',[ProductController::class,'product_detail'])->name('product_detail');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/MAH', [HomeController::class, 'MAH'])->name('MAH');

