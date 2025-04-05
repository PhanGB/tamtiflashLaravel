<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $reviews = DB::table('review')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->join('orders', 'review.id_order', '=', 'orders.id')
            ->select(
                'review.review as review_content',
                'users.name as customer_name',
                'orders.id as order_id'
            )->where('review.status', 1)
            ->get();

        $shops = Shop::orderBy('created_at', 'desc')->take(8)->get();
        $foods = Product::where('id_cate', 1)->orderBy('sold', 'desc')->take(8)->get();  // ID của "Thức ăn"
        $drinks = Product::where('id_cate', 2)->orderBy('sold', 'desc')->take(8)->get(); // ID của "Nước uống"

        return view('pages.home', compact('shops', 'reviews', 'foods', 'drinks'));
    }

    // public function getReviews()
    // {

    //     return view('pages.home', ['reviews' => $reviews]);
    // }

}
