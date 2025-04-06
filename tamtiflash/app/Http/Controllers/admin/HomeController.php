<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $todayOrdersCount = Order::whereDate('create_at', Carbon::today())->count();

        $monthOrdersCount = Order::whereMonth('create_at', Carbon::now()->month)
                                ->whereYear('create_at', Carbon::now()->year)
                                ->count();

        $todayRevenue = Order::whereDate('create_at', Carbon::today())
                            ->where('status', 2)
                            ->sum('total');

        $monthRevenue = Order::whereMonth('create_at', Carbon::now()->month)
                            ->whereYear('create_at', Carbon::now()->year)
                            ->where('status', 2)
                            ->sum('total');

        $complaintsCount = Review::complaints()->count();
        $goodReviewsCount = Review::goodReviews()->count();

        $topCategories = Order::where('status', 2)
            ->with('orderDetails.product.category')
            ->get()
            ->flatMap(function ($order) {
                return $order->orderDetails;
            })
            ->groupBy(function ($orderDetail) {
                return $orderDetail->product->category->name ?? 'Không xác định';
            })
            ->map(function ($group) {
                return $group->sum('quantity');
            })
            ->sortDesc()
            ->take(3);

        $topShippers = User::where('role', 2)
            ->withCount('deliveredOrders')
            ->orderBy('delivered_orders_count', 'desc')
            ->take(3)
            ->get();

        $data = [
            'todayOrdersCount' => $todayOrdersCount,
            'monthOrdersCount' => $monthOrdersCount,
            'todayRevenue' => $todayRevenue,
            'monthRevenue' => $monthRevenue,
            'complaintsCount' => $complaintsCount,
            'goodReviewsCount' => $goodReviewsCount,
            'topCategories' => $topCategories,
            'topShippers' => $topShippers,
        ];
        // Trả về view với dữ liệu đã tính toán
        return view('admin.home', $data);
    }
}
