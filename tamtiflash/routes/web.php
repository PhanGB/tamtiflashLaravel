<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/shopdetail/{id}', [ShopController::class, 'shop_detail']);
Route::get('/cart', [ShopController::class, 'cart']);
Route::get('/productdetail/{id}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/MAH', [HomeController::class, 'MAH'])->name('MAH');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

// my account
Route::get('/info', [UserController::class, 'index'])->name('info')->middleware('auth');
Route::post('/account/update', [UserController::class, 'update'])->name('account.update');
Route::post('/account/change-password', [UserController::class, 'changePassword'])->name('account.change-password');
Route::post('/add-address', [UserController::class, 'addAddress'])->name('add.address');
Route::delete('/delete-address/{id}', [UserController::class, 'destroy']);

// my order
Route::get('/my_order', [OrderController::class, 'getOrderDetails'])->name('my.order');
Route::get('/ordertracking/{id}', [OrderController::class, 'orderTracking'])->name('order.tracking');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';