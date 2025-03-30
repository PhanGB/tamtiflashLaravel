<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTrackingController extends Controller
{
    public function show($id)
{
    $order = Order::with('user', 'admin')->findOrFail($id); // Lấy đơn hàng cùng với thông tin người dùng và nhân viên giao hàng
    return view('admin.ordertracking.show', compact('order'));
}

    // Hiển thị danh sách theo dõi đơn hàng
    public function index(Request $request)
    {
        $orders = Order::paginate(10); // Lấy đơn hàng từ database và phân trang
        return view('admin.ordertracking', compact('orders'));
    }

    // Tìm kiếm đơn hàng theo mã đơn hàng hoặc trạng thái
    public function search(Request $request)
    {
        $search = $request->input('search');
        $orders = Order::where('order_code', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->get();
        return view('admin.ordertracking', compact('orders'));
    }
}
