<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Sử dụng model User thay vì Staff
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Lọc theo role (0: Admin, 2: Shipper)
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        } else {
            $query->whereIn('role', [0, 2]); // Mặc định chỉ lấy Admin và Shipper
        }

        // Tìm kiếm theo keyword
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('email', 'like', '%' . $request->keyword . '%');
        }

        $staffs = $query->get();

        return view('admin.staff', [
            'staffs' => $staffs,
        ]);
    }

    // Phương thức lấy trạng thái của một nhân viên
    public function getStatus($id)
    {
        $staff = User::findOrFail($id);
        return response()->json([
            'status' => $staff->status,
            'work' => $staff->work,
        ]);
    }
}
