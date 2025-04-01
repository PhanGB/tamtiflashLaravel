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

    // Quản lý đơn hàng
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('ordertracking');

    // Quản lý nhân viên và người dùng
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    // Quản lý đánh giá và voucher
     Route::get('/review', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('admin.review.approve/{id}', [ReviewController::class, 'approve'])->name('admin.review.approve');
    Route::get('admin.review.hide/{id}', [ReviewController::class, 'hide'])->name('admin.review.hide');
    Route::get('admin.review.show/{id}', [ReviewController::class, 'show'])->name('admin.review.show');

    Route::get('/voucher', [VoucherController::class, 'index'])->name('admin.voucher');
    Route::get('admin.voucher.add-voucher', [VoucherController::class, 'create'])->name('admin.voucher.create');
    Route::get('admin.voucher.edit', [VoucherController::class, 'view_edit'])->name('admin.voucher.view_edit');
    Route::get('admin.voucher.edit-voucher/{id}', [VoucherController::class, 'view_edit'])->name('admin.voucher.eidt');
    Route::post('admin/voucher/store', [VoucherController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/admin/voucher/{id}', [VoucherController::class, 'destroy'])->name('admin.voucher.destroy');
    Route::get('/admin/voucher/restore/{id}', [VoucherController::class, 'restore'])->name('admin.voucher.restore');

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
