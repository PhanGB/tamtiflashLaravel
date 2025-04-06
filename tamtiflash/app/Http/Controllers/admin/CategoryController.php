<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;




class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = Category::with('products')->get();
        $categoryList->transform(function ($category) {
            switch ($category->status) {
                case 1:
                    $category->status_text = 'Hoạt động';
                    $category->status_class = 'bg-success'; // Bootstrap class
                    break;
                case 2:
                    $category->status_text = 'Tạm ngưng';
                    $category->status_class = 'bg-warning';
                    break;
                default:
                    $category->status_text = 'Không xác định';
                    $category->status_class = 'bg-secondary';
                    break;
            }
            return $category;
        });
        $data = [
            'categoryList' => $categoryList,
        ];
        return view('admin.category', $data);
    }

    public function viewAdd(){
        return view('admin.category_add');
    }

    public function viewEdit($id){
        $category = Category::find($id);
        $data = [
            'category' => $category,
        ];
        return view('admin.category_edit', $data);
    }

    // public function add(Request $request){

    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:255|unique:categories,name', // Kiểm tra tên danh mục không được trùng
    //             'status' => 'required|in:1,2', // Chỉ chấp nhận giá trị 1 hoặc 2
    //             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);

    //         $image = $request->file('image');

    //         // Tạo tên file duy nhất (dựa trên thời gian)
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();

    //         // Di chuyển tệp ảnh vào thư mục public/img
    //         $image->move(public_path('images/categories'), $imageName);

    //         Category::create([
    //             'name' => $request->input('name'),
    //             'image' => $imageName,
    //             'mah' => $request->input('mah'),
    //             'status' => $request->input('status'),
    //         ]);

    //         return redirect()->route('admin.category')->with('success', 'Thêm thành công!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('admin.category_add')->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm. Vui lòng thử lại!');
    //     }
    //  }

    //  public function edit(Request $request, $id)
    //     {
    //         // Tìm sản phẩm
    //         $category = Category::find($id);

    //         // Validate dữ liệu đầu vào
    //         $request->validate([
    //             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra tệp ảnh
    //             'price' => 'required|numeric|min:0', // Kiểm tra giá là một số hợp lệ và >= 0
    //             'status' => 'required|in:1,2,3', // Kiểm tra trạng thái hợp lệ
    //             'mah' => 'required|in:0,1', // Chỉ chấp nhận giá trị 0 hoặc 1
    //         ]);

    //         // Kiểm tra và xử lý giá (loại bỏ dấu phẩy nếu có)
    //         $price = str_replace(',', '', $request->input('price')); // Loại bỏ dấu phẩy nếu có

    //         // Kiểm tra nếu có tệp ảnh mới
    //         if ($request->hasFile('image')) {
    //             // Lưu tệp ảnh vào thư mục public/img và lấy tên tệp
    //             $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    //             $request->file('image')->move(public_path('images/categories'), $imageName);
    //         } else {
    //             // Nếu không có tệp ảnh mới, giữ nguyên ảnh cũ
    //             $imageName = $category->image;
    //         }

    //         // Cập nhật thông tin sản phẩm
    //         $category->update([
    //                         'name' => $request->input('name'),
    //                         'status' => $request->input('status'),
    //                         'mah' => $request->input('mah'),
    //                         'image' => $imageName,
    //                     ]);
    //                     return redirect()->route('admin.category')->with('success', 'Sửa thành công!');
    //                 }

    public function add(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name', // Kiểm tra tên danh mục không được trùng
                'status' => 'required|in:1,2', // Chỉ chấp nhận giá trị 1 hoặc 2
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra hình ảnh
            ]);

            // Khởi tạo tên hình ảnh
            $imageName = null;

            if ($request->hasFile('image')) {
                // Xử lý hình ảnh nếu có
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Tạo tên file duy nhất
                // Di chuyển hình ảnh vào thư mục public/images/categories
                $image->move(public_path('images/categories'), $imageName);
            }

            // Tạo danh mục mới
            $category = Category::create([
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'mah' => $request->input('mah'),
                'image' => $imageName ?: 'default_image.jpg', // Lưu chỉ tên hình ảnh vào cơ sở dữ liệu
            ]);

            // Kiểm tra nếu danh mục được tạo thành công
            if ($category) {
                return redirect()->route('admin.category')->with('success', 'Thêm thành công!');
            } else {
                return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm danh mục. Vui lòng thử lại!');
            }
        } catch (\Exception $e) {
            // Kiểm tra chi tiết lỗi
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }



public function edit(Request $request, $id)
{
    // Tìm danh mục cần chỉnh sửa
    $category = Category::find($id);

    // Validate dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|in:1,2', // Kiểm tra trạng thái hợp lệ
        'mah' => 'required|in:0,1', // Kiểm tra loại danh mục hợp lệ
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra hình ảnh
    ]);

    $imageName = $category->image; // Giữ nguyên tên hình ảnh cũ nếu không có hình ảnh mới

    // Kiểm tra nếu có tệp hình ảnh mới
    if ($request->hasFile('image')) {
        // Xử lý hình ảnh mới
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Tạo tên file duy nhất
        $image->move(public_path('images/categories'), $imageName); // Di chuyển tệp hình ảnh vào thư mục images/categories
    }

    // Cập nhật danh mục với tên hình ảnh mới
    $category->update([
        'name' => $request->input('name'),
        'status' => $request->input('status'),
        'mah' => $request->input('mah'),
        'image' => $imageName, // Chỉ lưu tên hình ảnh vào cơ sở dữ liệu
    ]);

    return redirect()->route('admin.category')->with('success', 'Sửa danh mục thành công!');
}


    public function delete($id){
        $category = Category::find($id);

        // Kiểm tra nếu danh mục có sản phẩm liên kết
        if ($category->products()->exists()) {
            return redirect()->route('admin.category')->with('error', 'Không thể xóa danh mục vì vẫn còn sản phẩm liên kết!');
        }

        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Xoá thành công!');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $categoryList = Category::with('products')->get();
        $categoryList = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        if($categoryList -> isEmpty()){
            return redirect()->route('admin.category')->with('error', 'Không tìm thấy danh mục nào!');
        }
        $categoryList->transform(function ($category) {
            switch ($category->status) {
                case 1:
                    $category->status_text = 'Hoạt động';
                    $category->status_class = 'bg-success'; // Bootstrap class
                    break;
                case 2:
                    $category->status_text = 'Tạm ngưng';
                    $category->status_class = 'bg-warning';
                    break;
                default:
                    $category->status_text = 'Không xác định';
                    $category->status_class = 'bg-secondary';
                    break;
            }
            return $category;
        });
        return view('admin.category', ['categoryList' => $categoryList]);
    }

    public function sortByCate(){
        $categoryList = Category::with('products')->get();
        $categoryList->transform(function ($category) {
            switch ($category->status) {
                case 1:
                    $category->status_text = 'Hoạt động';
                    $category->status_class = 'bg-success'; // Bootstrap class
                    break;
                case 2:
                    $category->status_text = 'Tạm ngưng';
                    $category->status_class = 'bg-warning';
                    break;
                default:
                    $category->status_text = 'Không xác định';
                    $category->status_class = 'bg-secondary';
                    break;
            }
            return $category;
        });
        $data = [
            'categoryList' => $categoryList,
        ];
        return view('admin.category', $data);
    }
}
