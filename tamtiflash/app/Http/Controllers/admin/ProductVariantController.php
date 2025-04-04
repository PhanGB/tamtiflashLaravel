<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Shop;
use Illuminate\Http\Request;


class ProductVariantController extends Controller
{
    public function product_variant($id){
        $product = Product::find($id);
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
            'product' => $product,
        ];
        return view('admin.product_variant', $data);
     }

     public function viewAdd($id){
        $product = Product::find($id);
        $category = Category::find($product->id_cate);
        $shop = Shop::find($product->id_shop);
        $data =[
            'product' => $product,
            'category' => $category,
            'shop' => $shop,
        ];
        return view('admin.variant_add', $data);
     }

     public function add(Request $request, $id){

        try {
            $request->validate([
                'name' => 'required|string|max:255', // Kiểm tra tên biến thể
                'price' => 'required|numeric|min:0', // Kiểm tra giá là số hợp lệ và >= 0
                'status' => 'required|in:1,2,3', // Kiểm tra trạng thái hợp lệ
            ]);

            $variant = new ProductVariant();
            $variant->name = $request->name;
            $variant->price = $request->price;
            $variant->status = $request->status;
            $variant->id_product = $id;
            $variant->save();

            return redirect()->route('admin.product_variant', $id)->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.product_variant', $id)->with('error', 'Đã xảy ra lỗi khi thêm biến thể. Vui lòng thử lại!');
        }
     }

     public function viewEdit($id){
        $productVariant = ProductVariant::find($id);
        $product = Product::find($productVariant->id_product);
        $category = Category::find($product->id_cate);
        $shop = Shop::find($product->id_shop);
        $data =[
            'productVariant' => $productVariant,
            'product' => $product,
            'category' => $category,
            'shop' => $shop,
        ];
        return view('admin.variant_edit', $data);
     }

     public function edit(Request $request, $id){
        // Tìm biến thể sản phẩm
        $variant = ProductVariant::find($id);
        $request->validate([
            'name' => 'required|string|max:255', // Kiểm tra tên biến thể
            'price' => 'required|numeric|min:0', // Kiểm tra giá là số hợp lệ và >= 0
            'status' => 'required|in:1,2', // Kiểm tra trạng thái hợp lệ
        ]);

        $variant->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product_variant', $variant->id_product)->with('success', 'Sửa thành công');
     }

     public function delete($id){
        $variant = ProductVariant::find($id);
        $variant->delete();
        return redirect()->route('admin.product_variant', $variant->id_product)->with('success', 'Xóa thành công');
     }
}
