<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ShopsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrdertrackingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Quản lý sản phẩm
    Route::get('/products', [ProductsController::class, 'index'])->name('products');

    // Quản lý danh mục
    Route::get('/category', [CategoryController::class, 'index'])->name('category');

    // Quản lý cửa hàng
    Route::get('/shops', [ShopsController::class, 'index'])->name('shops');
    Route::get('/shops/add', [ShopsController::class, 'add_shop'])->name('add_shop');
    Route::post('/shops/add', [ShopsController::class, 'add'])->name('add');
    Route::get('/shops/edit/{id}', [ShopsController::class, 'edit_shop'])->name('edit_shop');
    Route::post('/shops/edit/{id}', [ShopsController::class, 'edit'])->name('edit');
    Route::get('/shops/delete/{id}', [ShopsController::class, 'delete'])->name('delete');

    // Quản lý đơn hàng
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('ordertracking');

    // Quản lý nhân viên và người dùng
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    // Quản lý đánh giá và voucher
    Route::get('/review', [ReviewController::class, 'index'])->name('review');
    Route::get('/review/approve/{id}', [ReviewController::class, 'approve'])->name('review.approve');
    Route::get('/review/hide/{id}', [ReviewController::class, 'hide'])->name('review.hide');
    Route::get('/review/show/{id}', [ReviewController::class, 'show'])->name('review.show');

    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::get('/voucher/add', [VoucherController::class, 'create'])->name('voucher.create');
    Route::get('/voucher/edit', [VoucherController::class, 'view_edit'])->name('voucher.view_edit');
    Route::get('/voucher/edit/{id}', [VoucherController::class, 'view_edit'])->name('voucher.edit');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
    Route::get('/voucher/restore/{id}', [VoucherController::class, 'restore'])->name('voucher.restore');

    // Cài đặt
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');

        // Quản lý phương thức thanh toán
        Route::get('/payment-method', [SettingsController::class, 'payment_method'])->name('payment_method');
        Route::get('/payment-method/edit', [SettingsController::class, 'edit_payment'])->name('edit_payment');
        Route::put('/payment-method/update', [SettingsController::class, 'update_payment'])->name('update_payment');

        // Quản lý phí vận chuyển
        Route::get('/shipping-fee', [SettingsController::class, 'shipping_fee'])->name('shipping_fee');
        Route::get('/shipping-fee/{id}', [SettingsController::class, 'edit_shipping'])->name('edit_shipping');
        Route::put('/shipping-fee/update', [SettingsController::class, 'update_shipping'])->name('update_shipping');
    });
});

