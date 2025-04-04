<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Admin\Shop;
use App\Models\Payment;
use App\Models\Payment_method;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

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
}
