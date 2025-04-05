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

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    //product
    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');

    Route::get('/products/product_add', [ProductsController::class, 'viewAdd'])->name('admin.product_add');
    Route::post('/products/add', [ProductsController::class, 'add'])->name('addPro');

    Route::get('/products/product_edit/{id}', [ProductsController::class , 'viewEdit'])->name('admin.product_edit');
    Route::put('/products/product_edit/{id}', [ProductsController::class, 'edit'])->name('editPro');

    Route::get('/products/search', [ProductsController::class, 'search'])->name('admin.product_search');
    Route::get('/products/sort', [ProductsController::class, 'sortByShop'])->name('admin.product_sort');

    Route::delete('/products/product_delete/{id}', [ProductsController::class, 'delete'])->name('deletePro');
    //product variant
    Route::get('/products/product_variant/{id}', [ProductVariantController::class, 'product_variant'])->name('admin.product_variant');

    Route::get('/products/variant_add/{id}', [ProductVariantController::class, 'viewAdd'])->name('product.variant_add');
    Route::post('/products/variant_add/{id}', [ProductVariantController::class, 'add'])->name('addVariant');

    Route::get('/products/variant_edit/{id}', [ProductVariantController::class, 'viewEdit'])->name('product.variant_edit');
    Route::put('/products/variant_edit/{id}', [ProductVariantController::class, 'edit'])->name('editVariant');

    Route::delete('/products/variant_delete/{id}', [ProductVariantController::class, 'delete'])->name('deleteVariant');
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::get('/category/category_add', [CategoryController::class, 'viewAdd'])->name('admin.category_add');
    Route::post('/category/add', [CategoryController::class, 'add'])->name('addCate');

    Route::get('category/category_edit/{id}', [CategoryController::class, 'viewEdit'])->name('admin.category_edit');
    Route::put('category/category_edit/{id}', [CategoryController::class, 'edit'])->name('editCate');

    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCate');

    Route::get('/category/search', [CategoryController::class, 'search'])->name('admin.category_search');
    Route::get('/category/sort', [CategoryController::class, 'sortByCate'])->name('admin.category_sort');

    Route::get('/shops', [ShopsController::class, 'index'])->name('admin.shops');
    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders');
    Route::get('/ordertracking', [OrdertrackingController::class, 'index'])->name('admin.ordertracking');
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/review', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('/voucher', [VoucherController::class, 'index'])->name('admin.voucher');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    // require __DIR__ . '/auth.php'; // Nếu có auth riêng cho admin
});
