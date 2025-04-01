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

    public function add(){
        $category = Category::create([
            'name' => $_POST['name'],
            'status' => $_POST['status'],
        ]);

        return redirect()->route('admin.category')->with('success', 'Thêm thành công!');
    }

    public function edit(Request $request, $id){
        $categoy = Category::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2', // Chỉ chấp nhận giá trị 1 hoặc 2
        ]);
        $categoy->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.category')->with('success', 'Sửa thành công!');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Xoá thành công!');
    }
}
