<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $user = Auth::user();
        $userRole = $user->role;

        // Kiểm tra xem role của người dùng có nằm trong danh sách roles được phép không
        if (!in_array($userRole, $roles)) {
            // Nếu không có quyền, chuyển hướng hoặc trả về lỗi
            if ($userRole == 1) {
                // Người dùng (role = 1) không được phép vào khu vực admin
                return redirect('/')->with('error', 'Bạn không có quyền truy cập khu vực admin.');
            } elseif ($userRole == 2) {
                // Shipper (role = 2) chỉ được phép vào các trang đơn hàng
                return redirect()->route('admin.orders')->with('error', 'Bạn chỉ có quyền truy cập phần đơn hàng.');
            } else {
                // Các role khác (nếu có)
                return redirect('/login')->with('error', 'Bạn không có quyền truy cập.');
            }
        }

        return $next($request);
    }
}
