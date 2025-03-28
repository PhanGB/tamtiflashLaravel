<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class OrdertrackingController extends Controller
{
    public function index()
    {

        return view('admin.ordertracking');
    }
}
