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
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // require __DIR__ . '/auth.php'; // Nếu có auth riêng cho admin
    // OrderTracking Option
    Route::get('/order-tracking', [AdminOrderController::class, 'index'])->name('admin.ordertrakcing');
    Route::get('/order-tracking/search', [AdminOrderController::class, 'search'])->name('admin.ordertracking.search');
    Route::get('/order-tracking/filter', [AdminOrderController::class, 'filter'])->name('admin.ordertracking.filter');
    Route::post('/order-tracking', [AdminOrderController::class, 'store'])->name('admin.ordertracking.store');
    Route::delete('/order-tracking/{id}', [AdminOrderController::class, 'destroy'])->name('admin.ordertracking.destroy');
    Route::get('/admin/order-tracking/{id}', [OrderTrackingController::class, 'show'])->name('ordertracking.show');


// Thêm route để hiển thị danh sách đơn hàng
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');

});
