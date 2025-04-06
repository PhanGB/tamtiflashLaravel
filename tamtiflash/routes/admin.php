<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ShopsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrdertrackingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard (Chỉ Admin)
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('role:0');

    // Quản lý sản phẩm (Chỉ Admin)
    Route::get('products', [ProductsController::class, 'index'])->name('products')->middleware('role:0');
    Route::get('/products/product_add', [ProductsController::class, 'viewAdd'])->name('product_add')->middleware('role:0');
    Route::post('/products/add', [ProductsController::class, 'add'])->name('addPro')->middleware('role:0');
    Route::get('/products/product_edit/{id}', [ProductsController::class, 'viewEdit'])->name('product_edit')->middleware('role:0');
    Route::put('/products/product_edit/{id}', [ProductsController::class, 'edit'])->name('editPro')->middleware('role:0');
    Route::get('/products/search', [ProductsController::class, 'search'])->name('product_search')->middleware('role:0');
    Route::get('/products/sort', [ProductsController::class, 'sortByShop'])->name('product_sort')->middleware('role:0');
    Route::delete('/products/product_delete/{id}', [ProductsController::class, 'delete'])->name('deletePro')->middleware('role:0');

    // Product Variant (Chỉ Admin)
    Route::get('/products/product_variant/{id}', [ProductVariantController::class, 'product_variant'])->name('product_variant')->middleware('role:0');
    Route::get('/products/variant_add/{id}', [ProductVariantController::class, 'viewAdd'])->name('product.variant_add')->middleware('role:0');
    Route::post('/products/variant_add/{id}', [ProductVariantController::class, 'add'])->name('addVariant')->middleware('role:0');
    Route::get('/products/variant_edit/{id}', [ProductVariantController::class, 'viewEdit'])->name('product.variant_edit')->middleware('role:0');
    Route::put('/products/variant_edit/{id}', [ProductVariantController::class, 'edit'])->name('editVariant')->middleware('role:0');
    Route::delete('/products/variant_delete/{id}', [ProductVariantController::class, 'delete'])->name('deleteVariant')->middleware('role:0');

    // Quản lý danh mục (Chỉ Admin)
    Route::get('/category', [CategoryController::class, 'index'])->name('category')->middleware('role:0');
    Route::get('/category/category_add', [CategoryController::class, 'viewAdd'])->name('category_add')->middleware('role:0');
    Route::post('/category/add', [CategoryController::class, 'add'])->name('addCate')->middleware('role:0');
    Route::get('category/category_edit/{id}', [CategoryController::class, 'viewEdit'])->name('category_edit')->middleware('role:0');
    Route::put('category/category_edit/{id}', [CategoryController::class, 'edit'])->name('editCate')->middleware('role:0');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCate')->middleware('role:0');
    Route::get('/category/search', [CategoryController::class, 'search'])->name('category_search')->middleware('role:0');
    Route::get('/category/sort', [CategoryController::class, 'sortByCate'])->name('category_sort')->middleware('role:0');

    // Quản lý cửa hàng (Chỉ Admin)
    Route::get('/shops', [ShopsController::class, 'index'])->name('shops')->middleware('role:0');
    Route::get('/shops/add', [ShopsController::class, 'add_shop'])->name('shops.add')->middleware('role:0');
    Route::post('/shops/add', [ShopsController::class, 'add'])->name('shops.store')->middleware('role:0');
    Route::get('/shops/edit/{id}', [ShopsController::class, 'edit_shop'])->name('shops.edit')->middleware('role:0');
    Route::post('/shops/edit/{id}', [ShopsController::class, 'edit'])->name('shops.update')->middleware('role:0');
    Route::get('/shops/delete/{id}', [ShopsController::class, 'delete'])->name('shops.delete')->middleware('role:0');

    // Quản lý đơn hàng (Admin và Shipper)
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders')->middleware('role:0,2');
    Route::patch('/orders/{id}/driver/update', [OrdersController::class, 'updateDriver'])->name('orders.update_driver')->middleware('role:0,2');

    //Quản lý theo dõi đơn hàng (Admin và Shipper)
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('ordertracking')->middleware('role:0,2');
    Route::get('/ordertracking/{id}', [OrdertrackingController::class, 'show'])->name('ordertracking.show')->middleware('role:0,2');
    Route::patch('/admin/orders/{id}/complete', [OrdertrackingController::class, 'markAsCompleted'])->name('orders.complete')->middleware('role:0,2');

    // Quản lý nhân viên (Chỉ Admin)
    Route::get('/staff', [StaffController::class, 'index'])->name('staff')->middleware('role:0');
    Route::get('/staff/add', [StaffController::class, 'add_staff'])->name('add_staff')->middleware('role:0');
    Route::post('/staff/add', [StaffController::class, 'add'])->name('add')->middleware('role:0');
    Route::get('/staff/detail/{id}', [StaffController::class, 'staffDetail'])->name('staff.detail')->middleware('role:0');
    Route::get('/staff/delete/{id}', [StaffController::class, 'staffDelete'])->name('staff.delete')->middleware('role:0');
    Route::get('/staff/status/{id}', [StaffController::class, 'getStatus'])->name('staff.status')->middleware('role:0');

    // Quản lý người dùng (Chỉ Admin)
    Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('role:0');

    // Quản lý đánh giá (Chỉ Admin)
    Route::get('/review', [ReviewController::class, 'index'])->name('review')->middleware('role:0');
    Route::get('review/approve/{id}', [ReviewController::class, 'approve'])->name('review.approve')->middleware('role:0');
    Route::get('review/hide/{id}', [ReviewController::class, 'hide'])->name('review.hide')->middleware('role:0');
    Route::get('review/show/{id}', [ReviewController::class, 'show'])->name('review.show')->middleware('role:0');

    // Quản lý voucher (Chỉ Admin)
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher')->middleware('role:0');
    Route::get('/voucher/add-voucher', [VoucherController::class, 'create'])->name('voucher.create')->middleware('role:0');
    Route::get('/voucher/edit-voucher/{id}', [VoucherController::class, 'view_edit'])->name('voucher.edit')->middleware('role:0');
    Route::put('/voucher/update', [VoucherController::class, 'update'])->name('voucher.update')->middleware('role:0');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store')->middleware('role:0');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy')->middleware('role:0');
    Route::get('/voucher/restore/{id}', [VoucherController::class, 'restore'])->name('voucher.restore')->middleware('role:0');

    // Cài đặt (Chỉ Admin)
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings')->middleware('role:0');
        Route::get('/payment-method', [SettingsController::class, 'payment_method'])->name('payment_method')->middleware('role:0');
        Route::get('/payment-method/edit', [SettingsController::class, 'edit_payment'])->name('edit_payment')->middleware('role:0');
        Route::put('/payment-method/update', [SettingsController::class, 'update_payment'])->name('update_payment')->middleware('role:0');
        Route::get('/shipping-fee', [SettingsController::class, 'shipping_fee'])->name('shipping_fee')->middleware('role:0');
        Route::get('/shipping-fee/{id}', [SettingsController::class, 'edit_shipping'])->name('edit_shipping')->middleware('role:0');
        Route::put('/shipping-fee/update', [SettingsController::class, 'update_shipping'])->name('update_shipping')->middleware('role:0');
    });
});

// Route đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout')->middleware('auth');
