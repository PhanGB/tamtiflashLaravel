<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;


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
}
