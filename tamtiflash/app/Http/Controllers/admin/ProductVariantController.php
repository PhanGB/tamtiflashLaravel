<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;


class ProductVariantController extends Controller
{
    public function product_variant($id){
        $productVariant = ProductVariant::with('product.shop', 'product.category')->where('id_product', "LIKE", $id)->get();
        $product = Product::find($id);
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
        return view('admin.product_variant', $data,compact('product', 'id'));
     }
     public function add($id){
        $product = Product::find($id);
        $productVariant = new ProductVariant();
        $productVariant->id_product = $id;
        $productVariant->name = request('name');
        $productVariant->price = request('price');
        $productVariant->save();
        return redirect()->route('admin.products_variant', ['id' => $id])
            ->with('product', $product)  // Truyền dữ liệu sản phẩm qua session
            ->with('success', 'Thêm biến thể sản phẩm thành công');

     }
     public function product_variant_add($id){
        $productVariant = ProductVariant::where('id_product', "LIKE", $id)->get();
        $product = Product::find($id);
        $productVariant = $product->variants;

        return view('admin.add_product_variant', compact('productVariant', 'id', 'product'));
     }


}
