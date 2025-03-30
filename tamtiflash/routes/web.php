<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

// my account
Route::get('/info', [UserController::class, 'index'])->name('info');
Route::post('/account/update', [UserController::class, 'update'])->name('account.update');
Route::post('/account/change-password', [UserController::class, 'changePassword'])->name('account.change-password');
Route::post('/add-address', [UserController::class, 'addAddress'])->name('add.address');
Route::delete('/delete-address/{id}', [UserController::class, 'destroy']);

// my order
Route::get('/my_order', [UserController::class, 'myOrder'])->name('my.order');
Route::get('/ordertracking', [OrderController::class, 'getOrderDetails']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/products', 'ProductsController@index')->name('admin.products');
    Route::get('/category', 'CategoryController@index')->name('admin.category');
    Route::get('/shops', 'ShopsController@index')->name('admin.shops');
    Route::get('/orders', 'OrdersController@index')->name('admin.orders');
    Route::get('/ordertracking', 'OrdertrackingController@index')->name('admin.ordertracking');
    Route::get('/staff', 'StaffController@index')->name('admin.staff');
    Route::get('/users', 'UsersController@index')->name('user.staff');
    Route::get('/review', 'ReviewController@index')->name('review.staff');
    Route::get('/voucher', 'VoucherController@index')->name('review.voucher');
    Route::get('/settings', 'SettingsController@index')->name('review.settings');
    
    
    require __DIR__ . '/auth.php';
    
});
require __DIR__ . '/auth.php';

