<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Admin;
use App\Models\User;
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
        $shipper = User::where('role', 2)->get(); // Lấy danh sách nhân viên giao hàng
        $user = User::where('role', 1)->get(); // Lấy danh sách người dùng
        // $orders = Order::paginate(10); // Lấy đơn hàng từ database và phân trang
        $ordersDelivery = Order::where('status', 1)->get(); // Lấy đơn hàng đang giao

        // lấy đơn hàng đã hoàn thành với status = 2
        $ordersCompleted = Order::where('status', 2)->get(); // Lấy đơn hàng đã hoàn thành
        return view('admin.ordertracking', compact('ordersDelivery', 'shipper', 'user', 'ordersCompleted'));
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

    public function markAsCompleted(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 2;
        $order->save();

        // Cập nhật trạng thái shipper (id_driver trong đơn hàng)
        $driver = User::find($order->id_driver);
        if ($driver) {
            $driver->update(['work' => 0]);
        }

        return redirect()->back()->with('success', 'Đơn hàng đã hoàn thành và shipper đã được cập nhật.');
    }

}
