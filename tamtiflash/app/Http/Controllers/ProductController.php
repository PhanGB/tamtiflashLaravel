<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_detail($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product_detail', ['id' => $id], compact('product'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);

        return view('pages.search', compact('products', 'keyword'));
    }

}
