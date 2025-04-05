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

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Quản lý sản phẩm
    Route::get('products', [ProductsController::class, 'index'])->name('products');

    Route::get('/products/product_add', [ProductsController::class, 'viewAdd'])->name('product_add');
    Route::post('/products/add', [ProductsController::class, 'add'])->name('addPro');

    Route::get('/products/product_edit/{id}', [ProductsController::class, 'viewEdit'])->name('product_edit');
    Route::put('/products/product_edit/{id}', [ProductsController::class, 'edit'])->name('editPro');

    Route::get('/products/search', [ProductsController::class, 'search'])->name('product_search');
    Route::get('/products/sort', [ProductsController::class, 'sortByShop'])->name('product_sort');

    Route::delete('/products/product_delete/{id}', [ProductsController::class, 'delete'])->name('deletePro');

    // Product Variant
    Route::get('/products/product_variant/{id}', [ProductVariantController::class, 'product_variant'])->name('product_variant');
    Route::get('/products/variant_add/{id}', [ProductVariantController::class, 'viewAdd'])->name('product.variant_add');
    Route::post('/products/variant_add/{id}', [ProductVariantController::class, 'add'])->name('addVariant');
    Route::get('/products/variant_edit/{id}', [ProductVariantController::class, 'viewEdit'])->name('product.variant_edit');
    Route::put('/products/variant_edit/{id}', [ProductVariantController::class, 'edit'])->name('editVariant');
    Route::delete('/products/variant_delete/{id}', [ProductVariantController::class, 'delete'])->name('deleteVariant');

    // Quản lý danh mục
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/category_add', [CategoryController::class, 'viewAdd'])->name('category_add');
    Route::post('/category/add', [CategoryController::class, 'add'])->name('addCate');
    Route::get('category/category_edit/{id}', [CategoryController::class, 'viewEdit'])->name('category_edit');
    Route::put('category/category_edit/{id}', [CategoryController::class, 'edit'])->name('editCate');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCate');

    // Thêm tuyến đường tìm kiếm và sắp xếp cho danh mục
    Route::get('/category/search', [CategoryController::class, 'search'])->name('category_search');
    Route::get('/category/sort', [CategoryController::class, 'sortByCate'])->name('category_sort');

    // Quản lý cửa hàng
    Route::get('/shops', [ShopsController::class, 'index'])->name('shops');
    Route::get('/shops/add', [ShopsController::class, 'add_shop'])->name('shops.add');
    Route::post('/shops/add', [ShopsController::class, 'add'])->name('shops.store');
    Route::get('/shops/edit/{id}', [ShopsController::class, 'edit_shop'])->name('shops.edit');
    Route::post('/shops/edit/{id}', [ShopsController::class, 'edit'])->name('shops.update');
    Route::get('/shops/delete/{id}', [ShopsController::class, 'delete'])->name('shops.delete');

    // Quản lý đơn hàng
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('ordertracking');

    // Quản lý nhân viên
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/staff/add', [StaffController::class, 'add_staff'])->name('staff.add_staff');
    Route::post('/staff/add', [StaffController::class, 'add'])->name('staff.add');
    Route::get('/staff/detail/{id}', [StaffController::class, 'staffDetail'])->name('staff.detail');
    Route::get('/staff/delete/{id}', [StaffController::class, 'staffDelete'])->name('staff.delete');
    Route::get('/staff/status/{id}', [StaffController::class, 'getStatus'])->name('staff.status');

    // Quản lý người dùng
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    // Quản lý đánh giá
    Route::get('/review', [ReviewController::class, 'index'])->name('review');
    Route::get('review/approve/{id}', [ReviewController::class, 'approve'])->name('review.approve');
    Route::get('review/hide/{id}', [ReviewController::class, 'hide'])->name('review.hide');
    Route::get('review/show/{id}', [ReviewController::class, 'show'])->name('review.show');

    // Quản lý voucher
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::get('/voucher/add-voucher', [VoucherController::class, 'create'])->name('voucher.create');
    Route::get('/voucher/edit-voucher/{id}', [VoucherController::class, 'view_edit'])->name('voucher.edit');
    Route::put('/voucher/update', [VoucherController::class, 'update'])->name('voucher.update');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
    Route::get('/voucher/restore/{id}', [VoucherController::class, 'restore'])->name('voucher.restore');

    // Cài đặt
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings');
        Route::get('/payment-method', [SettingsController::class, 'payment_method'])->name('payment_method');
        Route::get('/payment-method/edit', [SettingsController::class, 'edit_payment'])->name('edit_payment');
        Route::put('/payment-method/update', [SettingsController::class, 'update_payment'])->name('update_payment');

        // Quản lý phí vận chuyển
        Route::get('/shipping-fee', [SettingsController::class, 'shipping_fee'])->name('shipping_fee');
        Route::get('/shipping-fee/{id}', [SettingsController::class, 'edit_shipping'])->name('edit_shipping');
        Route::put('/shipping-fee/update', [SettingsController::class, 'update_shipping'])->name('update_shipping');
    });
});
