<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Admin\Shop;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment_method;
use App\Models\ShippingFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $shop = Shop::all();
        $user = auth()->user();
        $address = Address::all();
        if ($address->isEmpty()) {
            return redirect()->route('info')->with('error', 'Vui lòng thêm địa chỉ trước khi thanh toán.');
        }
        $shippingFee = ShippingFee::all();
        $banking = Payment_method::all()->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }
        if (empty($cart)) {
            return redirect()->route('products')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        // Calculate the grand total
        $grand_total = array_reduce($cart, function ($total, $item) {
            return $total + ($item['quantity'] * $item['price']);
        }, 0);

        return view('pages.checkout', [
            'cart' => $cart,
            'grand_total' => $grand_total,
            'user' => $user,
            'shop' => $shop,
            'address' => $address,
            'shippingFee' => $shippingFee,
            'banking' => $banking,
        ]);
    }

    public function process(Request $request) {
        try {
            $order = Order::create([
                'total' => $request->total,
                'payment_method' => $request->method,
                'note' => $request->note,
                'shipping_fee' => $request->shipping_fee,
                'id_user' => Auth::user()->id
            ]);
            foreach(session()->get('cart') as $item) {
                OrderDetail::create([
                    'unit_price' => $item['price'], // Giá sản phẩm
                    'quantity' => $item['quantity'], // Số lượng
                    'id_order' => $order->id, // Mã đơn hàng
                    'id_product' => $item['id'], // Mã sản phẩm
                    'status' => 0, // Trạng thái đơn hàng (0: chưa xử lý, 1: đã xử lý)
                ]);
            }
            session()->forget('cart');
            return redirect('/')->with('success', 'Đặt hàng thành công');
        } catch (\Throwable $th) {
            // return redirect('/checkout')->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
            \Log::error($th->getMessage());
            return redirect('/checkout')->with('error', $th->getMessage());
        }
    }
}
