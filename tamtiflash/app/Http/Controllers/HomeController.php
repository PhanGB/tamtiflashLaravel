<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Shop;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('sold', 'desc')->take(8)->get();
        $shops = Shop::orderBy('created_at', 'desc')->take(8)->get();
        return view('pages.home', compact('products', 'shops'));
    }
    public function MAH(){
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('pages.MarketAtHome', compact('products'));
    }

}
