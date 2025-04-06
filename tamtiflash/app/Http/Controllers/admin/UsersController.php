<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=', '0')->get();
        $data = [
            'users' => $users,
        ];
        return view('admin.users', $data);
    }
}
