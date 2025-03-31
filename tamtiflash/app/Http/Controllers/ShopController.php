<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $shops = Shop::all();
        return view('pages.shop', compact('shops'));
    }
    public function shop_detail(Request $request,$id)
    {
        // Tìm cửa hàng theo ID
        $shop = Shop::findOrFail($id);

        // Lấy danh sách sản phẩm thuộc shop đó
        $products = $shop->products;

        // Lấy giá trị category từ request (mặc định là 'all')
        $category = $request->input('category', 'all');

    // Lọc sản phẩm theo danh mục nếu không phải 'all'
        $products = $shop->products();

        if ($category !== 'all') {
            $products = $products->where('category', $category);
        }

    // Lấy danh sách sản phẩm sau khi lọc
        $products = $products->get();

        // Trả về view với dữ liệu shop và sản phẩm
        return view('pages.shop_detail', compact('shop', 'products', 'category'));
    }
    public function cart()
    {
        return view('pages.cart');
    }

}
