<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();

            // Lấy danh sách địa chỉ của user
            $addresses = $user->addresses ?? collect(); // Tránh lỗi khi không có dữ liệu

            return view('pages.my_account', compact('user', 'addresses'));
        }

        return redirect()->route('login')->with('error', 'Bạn phải đăng nhập để truy cập trang này.');
    }




    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old-pass' => 'required',
            'new-pass' => 'required|min:6',
            're-pass' => 'required|same:new-pass',
        ], [
            'old-pass.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new-pass.required' => 'Vui lòng nhập mật khẩu mới.',
            'new-pass.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            're-pass.required' => 'Vui lòng nhập lại mật khẩu mới.',
            're-pass.same' => 'Xác nhận mật khẩu không khớp.',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->input('old-pass'), $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không đúng.');
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->input('new-pass'));
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function addAddress(Request $request)
    {
        // Kiểm tra user đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập để thêm địa chỉ.');
        }

        // Validate dữ liệu nhập vào
        $request->validate([
            'new-address' => 'required|string',
            // 'id_user' => 'required|exists:users,id',
        ]);

        // Lấy user hiện tại
        $user = auth()->user();

        // Tạo địa chỉ mới
        Address::create([
            'id_user' => $user->id,
            'address' => $request->input('new-address'),
        ]);

        // Quay lại trang cá nhân với thông báo thành công
        return redirect()->back()->with('success', 'Địa chỉ đã được thêm thành công.');
    }

    public function destroy($id)
    {
        $address = Address::find($id);
        if ($address) {
            $address->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // my order
    public function myOrder()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return view('pages.my_orders', compact('user'));
        }

        return redirect()->route('login')->with('error', 'Bạn phải đăng nhập để truy cập trang này.');
    }

}
