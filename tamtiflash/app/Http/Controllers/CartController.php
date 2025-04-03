<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []);
        $grand_total = array_reduce($cart, function ($total, $item) {
            return $total + ($item['quantity'] * $item['price']);
        }, 0);

        return view('pages.cart', [
            'cart' => $cart,
            'grand_total' => $grand_total
        ]);
    }

    public function add(Request $request) {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            if ($item['id'] == $product->id && $item['variant'] == $request->variant) {
                $item['quantity'] += $request->quantity;
                session()->put('cart', $cart);
                return $cart;
            }
        }

        if ($request->id_variant) {
            $variant = ProductVariant::findOrFail($request->id_variant);
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $variant->price,
                'image' => $product->image,
                'variant' => $variant->name,
                'quantity' => $request->quantity
            ];
        } else {
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'variant' => null,
                'quantity' => $request->quantity
            ];
        }


        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'cart_count' => count($cart),
            'message' => 'Đã thêm vào giỏ hàng!'
        ]);
    }

    public function update(Request $request) {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->index]) && $request->quantity > 0) {
            $cart[$request->index]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        $grand_total = array_reduce($cart, function ($total, $item) {
            return $total + ($item['quantity'] * $item['price']);
        }, 0);
        return [
            'lineTotal' => $cart[$request->index]['quantity'] * $cart[$request->index]['price'],
            'grandTotal' => $grand_total
        ];
    }

    public function remove($index) {
        $cart = session()->get('cart', []);
        unset($cart[$index]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
}
