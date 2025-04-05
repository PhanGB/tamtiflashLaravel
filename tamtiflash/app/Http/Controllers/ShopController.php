<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $shops = Shop::all();
        return view('pages.shop', compact('shops'));
    }
    public function shop_detail(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $category = $request->input('category', 'all'); // Lấy category từ URL (mặc định là 'all')

        // Tìm tên danh mục
        $categoryName = 'Tất cả';
        if ($category !== 'all') {
            $selectedCategory = Category::find($category);
            $categoryName = $selectedCategory ? $selectedCategory->name : 'Không xác định';
        }

        // Lấy danh sách danh mục để hiển thị trong bộ lọc
        $categories = Category::all();

        // Lấy danh sách sản phẩm, lọc theo id_cate nếu category khác 'all'
        $productsQuery = $shop->products();

        if ($category !== 'all') {
            $productsQuery = $productsQuery->where('id_cate', $category);
        }

        $products = $productsQuery->get();
        $productCount = $products->count();

        return view('pages.shop_detail', compact('shop', 'products', 'category', 'categories', 'categoryName', 'productCount'));
    }



    public function cart()
    {
        return view('pages.cart');
    }

}
