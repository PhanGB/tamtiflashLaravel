<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    public function index()
    {
        $drivers = User::where('role', 2)->where('work', 0)->get();
        $orders = Order::where('status', 0)->get();
        return view('admin.orders', compact('orders', 'drivers'));
    }

    public function updateDriver(Request $request, $id) {
        try {
            $order = Order::find($id);
            $order->update([
                'status' => 1,
                'id_driver' => $request->input('id_driver')
            ]);
            return redirect('/admin/orders');
        } catch (\Exception $e) {
            Log::error("Error updating order {$id}: " . $e->getMessage());
            return redirect('/admin/orders');
        }


    }
}
