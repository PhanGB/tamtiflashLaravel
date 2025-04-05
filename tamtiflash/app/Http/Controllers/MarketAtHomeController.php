<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MarketAtHomeController extends Controller
{
    //
    public function MAH()
    {
        $categories = Category::where('mah', 1)->get();
        $products = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('mah', 1);
            })
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(8);

        $productsHot = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('mah', 1);
            })
            ->where('status', 1)
            ->where('sold', '>', 10)
            ->orderBy('id', 'desc')
            ->paginate(8);


        return view('pages.MarketAtHome', compact(
            'products',
            'categories',
            'productsHot',
        ));
    }
}
