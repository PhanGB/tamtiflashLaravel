<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Shop;

class ShopsController extends Controller
{
    public function index()
    {
        $shops =Shop::all();
        return view('admin.shops',compact('shops'));
    }
    public function add_shop(){
        return view('admin.add_shop');
    }
    public function edit_shop($id){
        $shop = Shop::find($id);
        return view('admin.edit_shop',compact('shop'));
    }
    public function delete_shop($id){
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('admin.shops')->with('success', 'Shop deleted successfully');
    }
}
