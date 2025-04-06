<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('ordertracking.show', compact('orders'));
    }

    public function receive($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Đang Giao';
        $order->save();

        return redirect()->route('ordertracking.show', $order->id)->with('success', 'Đơn hàng đã được nhận và đang giao.');
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Hoàn Thành';
        $order->save();

        return redirect()->route('ordertracking.show', $order->id)->with('success', 'Đơn hàng đã được hoàn thành.');
    }
}

