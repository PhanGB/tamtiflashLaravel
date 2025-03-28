<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public function index()
    {

        return view('admin.voucher');
    }
}
