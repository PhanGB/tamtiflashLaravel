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
    public function shopDetail($id)
    {
        // Tìm cửa hàng theo ID
        $shop = Shop::findOrFail($id);

        // Lấy danh sách sản phẩm thuộc shop đó
        $products = $shop->products;

        // Trả về view với dữ liệu shop và sản phẩm
        return view('pages.shop_detail', compact('shop', 'products'));
    }
    public function cart()
    {
        return view('pages.cart');
    }

}
