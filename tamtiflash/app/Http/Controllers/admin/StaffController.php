<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Sử dụng model User thay vì Staff
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

    public function add_staff(){
        return view('admin.staff_add');
    }

    public function add(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|min:10|max:15',
                'password' => 'required|string|min:8',
            ]);
            // Tạo my_code gồm 9 ký tự chỉ chứa chữ in hoa và số
            $myCode = strtoupper(Str::random(9));
            $myCode = preg_replace('/[^A-Z0-9]/', '', $myCode);

            // Nếu chưa đủ 9 ký tự do bị loại bỏ, tạo lại
            while (strlen($myCode) < 9) {
                $myCode .= strtoupper(Str::random(1));
                $myCode = preg_replace('/[^A-Z0-9]/', '', $myCode);
            }

            $staff = new User();
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->password = Hash::make($request->password);
            $staff->phone = $request->phone;
            $staff->status = 0; // Mặc định trạng thái là hoạt động
            $staff->work = 0; // Mặc định làm việc
            $staff->role = 2;
            $staff->my_code = $myCode; // Gán my_code cho nhân viên
            $staff->save();

            return redirect()->route('admin.staff')->with('success', 'Thêm nhân viên thành công!');
        }catch(\Exception $e){
            // Xử lý lỗi nếu có
            return redirect()->route('admin.staff')->with('error', 'Lỗi rồi!');
        }


    }
}
