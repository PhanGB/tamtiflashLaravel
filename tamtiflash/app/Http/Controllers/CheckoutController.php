<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $user = auth()->user();
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
        ]);
    }
}
