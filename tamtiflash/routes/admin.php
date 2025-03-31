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


    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // require __DIR__ . '/auth.php'; // Nếu có auth riêng cho admin
});
