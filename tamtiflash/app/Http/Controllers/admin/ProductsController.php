<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;




class ProductsController extends Controller
{
    public function index()
    {
        $productList = Product::with('shop', 'category', 'variants')->orderBy('id', 'desc')->simplePaginate(10);
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

        $shop = Shop::all();
        $data = [
            'productList' => $productList,
            'shop' => $shop,
        ];
        return view('admin.products', $data);
    }

    public function viewAdd()
    {
        $shop = Shop::all();
        $category = Category::all();
        $data = [
           'shop' => $shop,
            'category' => $category,
        ];
        return view('admin.product_add', $data);
    }

     public function viewEdit($id){
        $product = Product::find($id);
        $shop = Shop::all();
        $category = Category::all();
        $data = [
            'product' => $product,
            'shop' => $shop,
            'category' => $category,
        ];
        return view('admin.product_edit', $data);
     }

     public function add(Request $request){

        try {
            $request->validate([
                'name' => 'required|string|max:255', // Kiểm tra tên sản phẩm
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra tệp ảnh
                'price' => 'required|numeric|min:0', // Kiểm tra giá là số hợp lệ và >= 0
                'status' => 'required|in:1,2,3', // Kiểm tra trạng thái hợp lệ
            ]);

            $image = $request->file('image');

            // Tạo tên file duy nhất (dựa trên thời gian)
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Di chuyển tệp ảnh vào thư mục public/img
            $image->move(public_path('img'), $imageName);

            Product::create([
                'name' => $request->input('name'),
                'image' => $imageName,
                'price' => $request->input('price'),
                'status' => $request->input('status'),
                'id_shop' => $request->input('shop'),
                'id_cate' => $request->input('category'),
            ]);

            return redirect()->route('admin.products')->with('success', 'Thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product_add')->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm. Vui lòng thử lại!');
        }
     }

     public function edit(Request $request, $id)
        {
            // Tìm sản phẩm
            $product = Product::find($id);

            // Validate dữ liệu đầu vào
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra tệp ảnh
                'price' => 'required|numeric|min:0', // Kiểm tra giá là một số hợp lệ và >= 0
                'status' => 'required|in:1,2,3', // Kiểm tra trạng thái hợp lệ
            ]);

            // Kiểm tra và xử lý giá (loại bỏ dấu phẩy nếu có)
            $price = str_replace(',', '', $request->input('price')); // Loại bỏ dấu phẩy nếu có

            // Kiểm tra nếu có tệp ảnh mới
            if ($request->hasFile('image')) {
                // Lưu tệp ảnh vào thư mục public/img và lấy tên tệp
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('img'), $imageName);
            } else {
                // Nếu không có tệp ảnh mới, giữ nguyên ảnh cũ
                $imageName = $product->image;
            }

            // Cập nhật thông tin sản phẩm
            $product->update([
                'name' => $request->input('name'),
                'image' => $imageName,  // Lưu đường dẫn tới ảnh
                'price' => $price,  // Lưu giá đã xử lý (đã loại bỏ dấu phẩy)
                'status' => $request->input('status'),
                'id_shop' => $request->input('shop'),
                'id_cate' => $request->input('category'),
            ]);

            // Cập nhật trạng thái của các biến thể thuộc sản phẩm
            $product->variants()->update(['status' => $request->input('status')]);

            // Chuyển hướng và hiển thị thông báo thành công
            return redirect()->route('admin.products')->with('success', 'Sản phẩm và các biến thể đã được cập nhật!');
        }



     public function delete($id){
        $product = Product::find($id);

        // Kiểm tra nếu sản phẩm có biến thể liên kết
        if ($product->variants()->exists()) {
            return redirect()->route('admin.products')->with('error', 'Không thể xóa sản phẩm vì vẫn còn biến thể liên kết!');
        }

        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Xóa thành công!');
     }

     public function search(){
        $search = request()->input('search');
        $productList = Product::with('shop', 'category', 'variants')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhereHas('shop', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->simplePaginate(10);

        if ($productList->isEmpty()) {
            return redirect()->route('admin.products')->with('error', 'Không tìm thấy sản phẩm nào!');
        }

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

         // Trả về view với danh sách sản phẩm đã tìm kiếm
        $shop = Shop::all();
        $data = [
            'productList' => $productList,
            'shop' => $shop,
        ];
        return view('admin.products', $data);
     }

     public function sortByShop(){
        $id = request()->input('shop'); // Lấy shop ID từ request

        // Nếu không có shop ID, hiển thị tất cả sản phẩm
        $productList = Product::with('shop', 'category', 'variants');
        if ($id) {
            $productList = $productList->where('id_shop', $id);
        }
        $productList = $productList->simplePaginate(10);

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

        // Trả về view với danh sách sản phẩm đã tìm kiếm
        $shop = Shop::all();
        $data = [
            'productList' => $productList,
            'shop' => $shop,
        ];
        return view('admin.products', $data);
     }


}
