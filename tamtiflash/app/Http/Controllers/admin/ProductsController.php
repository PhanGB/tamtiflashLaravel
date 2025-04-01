<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;


class ProductsController extends Controller
{
    public function index()
    {
        $productList = Product::with('shop', 'category', 'variants')->simplePaginate(10);
        $productList->transform(function ($product) {
            switch ($product->status) {
                case 1:
                    $product->status_text = 'Hoạt động';
                    $product->status_class = 'bg-success'; // Bootstrap class
                    break;
                case 2:
                    $product->status_text = 'Tạm ngưng';
                    $product->status_class = 'bg-warning';
                    break;
                case 3:
                    $product->status_text = 'Ngừng kinh doanh';
                    $product->status_class = 'bg-danger';
                    break;
                default:
                    $product->status_text = 'Không xác định';
                    $product->status_class = 'bg-secondary';
                    break;
            }
            return $product;
        });
        $data = [
            'productList' => $productList,
        ];
        return view('admin.products', $data);
    }

    public function viewAdd()
    {
        return view('admin.product_add');
    }

     public function viewEdit($id){
        $product = Product::find($id);
        $data = [
            'product' => $product,
        ];
        return view('admin.product_edit', $data);
     }

     public function product_variant($id){
        $productVariant = ProductVariant::with('product.shop', 'product.category')->where('id_product', "LIKE", $id)->get();
        $productVariant->transform(function ($product) {
            switch ($product->status) {
                case 1:
                    $product->status_text = 'Hoạt động';
                    $product->status_class = 'bg-success'; // Bootstrap class
                    break;
                case 2:
                    $product->status_text = 'Tạm ngưng';
                    $product->status_class = 'bg-warning';
                    break;
                case 3:
                    $product->status_text = 'Ngừng kinh doanh';
                    $product->status_class = 'bg-danger';
                    break;
                default:
                    $product->status_text = 'Không xác định';
                    $product->status_class = 'bg-secondary';
                    break;
            }
            return $product;
        });
        $data = [
            'productVariant' => $productVariant,
        ];
        return view('admin.product_variant', $data);
     }
}
