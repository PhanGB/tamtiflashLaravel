<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrderDetails()
    {
        $userId = Auth::id(); // Lấy ID của user đang đăng nhập

        $orders = Order::where('orders.id_user', $userId) // Lọc theo id_user
            ->join('order_detail', 'orders.id', '=', 'order_detail.id_order')
            ->join('products', 'order_detail.id_product', '=', 'products.id')
            ->join('shop', 'products.id_shop', '=', 'shop.id')
            ->select(
                'orders.id as order_id',
                'shop.name as shop_name',
                'orders.status as status',
                'orders.create_at as order_date',
                'products.name as product_name',
                'order_detail.quantity',
                'orders.total'
            )
            ->get();
        $data = [
            'orders' => $orders,
        ];
        return view('pages.my_orders', $data);

        // return response()->json($orders);
    }
    public function orderTracking($id)
    {
        $userId = Auth::id(); // Lấy ID user đang đăng nhập

        $orders = Order::where('orders.id_user', $userId)
            ->where('orders.id', $id) // Lọc theo ID đơn hàng trên URL
            ->join('order_detail', 'orders.id', '=', 'order_detail.id_order')
            ->join('products', 'order_detail.id_product', '=', 'products.id')
            ->join('shop', 'products.id_shop', '=', 'shop.id')
            ->select(
                'orders.id as order_id',
                'shop.name as shop_name',
                'orders.status as status',
                'orders.create_at as order_date',
                'products.name as product_name',
                'order_detail.quantity',
                'order_detail.unit_price as product_price',
                'orders.total'
            )
            ->get(); // Lấy danh sách sản phẩm của đơn hàng

        if ($orders->isEmpty()) {
            return abort(404, 'Không tìm thấy đơn hàng');
        }

        // Format lại ngày tháng cho từng sản phẩm trong đơn hàng
        foreach ($orders as $order) {
            $order->order_date = Carbon::parse($order->order_date)->format('d/m/Y H:i');
        }

        return view('pages.ordertracking', ['orders' => $orders]);
    }

}
