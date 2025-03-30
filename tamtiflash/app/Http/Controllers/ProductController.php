<?php

namespace App\Http\Controllers;
use App\Models\Admin\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product_detail($id)
    {
        $productvariants = Product::findOrFail($id)->variants;
        $product = Product::findOrFail($id);
        return view('pages.product_detail', ['id' => $id], compact('product', 'productvariants'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);

        return view('pages.search', compact('products', 'keyword'));
    }

    public function filterByCategory($category_id)
    {
    $products = Product::where('category_id', $category_id)->orderBy('', 'asc')->get();
    $category = Category::find($category_id);

    return view('products.category', compact('products', 'category'));
    }


}