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
        // Đếm số đơn hàng trong ngày
        $todayOrdersCount = Order::whereDate('create_at', Carbon::today())->count();

        // Đếm số đơn hàng trong tháng
        $monthOrdersCount = Order::whereMonth('create_at', Carbon::now()->month)
                                ->whereYear('create_at', Carbon::now()->year)
                                ->count();

        // Tính tổng phí vận chuyển trong ngày
        $todayRevenue = Order::whereDate('create_at', Carbon::today())
                            ->where('status', 2)
                            ->sum('shipping_fee');

        // Tính tổng phí vận chuyển trong tháng
        $monthRevenue = Order::whereMonth('create_at', Carbon::now()->month)
                            ->whereYear('create_at', Carbon::now()->year)
                            ->where('status', 2)
                            ->sum('shipping_fee');

        // Tính tổng giá trị đơn hàng trong ngày cho đơn hàng có sản phẩm thuộc danh mục "tamtiflash"
        $todayTamtiflashRevenue = Order::whereDate('create_at', Carbon::today())
            ->where('status', 2)
            ->whereHas('orderDetails.product.category', function ($query) {
                $query->where('name', 'tamtiflash');
            })
            ->sum('total');

        // Tính tổng giá trị đơn hàng trong tháng cho đơn hàng có sản phẩm thuộc danh mục "tamtiflash"
        $monthTamtiflashRevenue = Order::whereMonth('create_at', Carbon::now()->month)
            ->whereYear('create_at', Carbon::now()->year)
            ->where('status', 2)
            ->whereHas('orderDetails.product.category', function ($query) {
                $query->where('name', 'tamtiflash');
            })
            ->sum('total');

        // Đếm số lượng khiếu nại và đánh giá tốt
        $complaintsCount = Review::complaints()->count();
        $goodReviewsCount = Review::goodReviews()->count();

        // Lấy 3 danh mục hàng hóa được giao nhiều nhất
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

        // Lấy 3 nhân viên giao hàng năng suất nhất trong tháng hiện tại
        $topShippers = User::where('role', 2)
            ->with(['deliveredOrders' => function ($query) {
                $query->whereMonth('create_at', Carbon::now()->month)
                      ->whereYear('create_at', Carbon::now()->year)
                      ->where('status', 2);
            }])
            ->get()
            ->map(function ($user) {
                $user->delivered_orders_count = $user->deliveredOrders->count();
                return $user;
            })
            ->sortByDesc('delivered_orders_count');

        // Dữ liệu trả về view
        $data = [
            'todayOrdersCount' => $todayOrdersCount,
            'monthOrdersCount' => $monthOrdersCount,
            'todayRevenue' => $todayRevenue,
            'monthRevenue' => $monthRevenue,
            'todayTamtiflashRevenue' => $todayTamtiflashRevenue,
            'monthTamtiflashRevenue' => $monthTamtiflashRevenue,
            'complaintsCount' => $complaintsCount,
            'goodReviewsCount' => $goodReviewsCount,
            'topCategories' => $topCategories,
            'topShippers' => $topShippers,
        ];

        return view('admin.home', $data);
    }
}
