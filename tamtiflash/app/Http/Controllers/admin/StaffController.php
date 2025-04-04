<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Staff;
use Illuminate\Http\Request;
class StaffController extends Controller
{
    public function index(Request $request)
    {
        $query = Staff::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $staffs = $query->get();

        return view('admin.staff', [
            'staffs' => $staffs,
        ]);
    }

}
