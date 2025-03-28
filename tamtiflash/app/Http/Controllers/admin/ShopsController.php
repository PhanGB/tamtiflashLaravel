<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    public function index()
    {

        return view('admin.shops');
    }
}
