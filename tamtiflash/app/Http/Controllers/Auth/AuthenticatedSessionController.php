<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) { // Dùng guard mặc định
            $user = Auth::user();

            // Kiểm tra nếu là Shipper
            if ($user->isShipper()) {
                $user->status = 1; // Online
                $user->save();

                $request->session()->regenerate();
                return redirect()->intended('/admin/orders');
            }

        }
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->isShipper()) {
            $user->status = 0; // Offline
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
