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

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/shops', [ShopsController::class, 'index'])->name('admin.shops');
    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders');
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('admin.ordertracking');
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/review', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('/voucher', [VoucherController::class, 'index'])->name('admin.voucher');
    Route::get('admin.voucher.add-voucher', [VoucherController::class, 'create'])->name('admin.voucher.create');
    Route::get('admin.voucher.edit', [VoucherController::class, 'view_edit'])->name('admin.voucher.view_edit');
    Route::get('admin.voucher.edit-voucher/{id}', [VoucherController::class, 'view_edit'])->name('admin.voucher.eidt');
    Route::post('admin/voucher/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/admin/voucher/{id}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
    Route::get('/admin/voucher/restore/{id}', [VoucherController::class, 'restore'])->name('admin.voucher.restore');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');

    // Cài đặt
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings');

        // Quản lý phương thức thanh toán
        Route::get('/payment-method', [SettingsController::class, 'payment_method'])->name('payment_method');
        Route::get('/payment-method/edit', [SettingsController::class, 'edit_payment'])->name('edit_payment');
        Route::put('/payment-method/update', [SettingsController::class, 'update_payment'])->name('update_payment');
        // Quản lý phí vận chuyển
        Route::get('/shipping-fee', [SettingsController::class, 'shipping_fee'])->name('shipping_fee');
        Route::get('/shipping-fee/{id}', [SettingsController::class, 'edit_shipping'])->name('edit_shipping');
        Route::put('/shipping-fee/update', [SettingsController::class, 'update_shipping'])->name('update_shipping');
    });

    // Nếu có file auth riêng cho admin
    // require __DIR__ . '/auth.php';
});

// Middleware để bảo vệ các route admin (nếu cần)
// Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () { ... });
