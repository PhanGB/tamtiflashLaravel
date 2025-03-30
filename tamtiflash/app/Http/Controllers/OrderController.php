<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
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
                'orders.status',
                'orders.created_at as order_date',
                'products.name as product_name',
                'order_detail.quantity',
                'orders.total'
            )
            ->get();

        return response()->json($orders);
    }
}
