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
    public function add(){
        $shop = new Shop();
        $shop->name = request('name');
        $shop->rate = request('rate');
        $shop->short_description = request('short_description');
        $shop->time_open = request('time_open');
        $shop->time_close = request('time_close');
        $shop->address = request('address');
        $shop->status = request('status');
        $shop->save();

        return redirect()->route('admin.shops')->with('success', 'Shop added successfully');
    }
    public function edit_shop($id){
        $shop = Shop::find($id);
        return view('admin.edit_shop',compact('shop'));
    }
    public function delete($id)
    {
        $shop = Shop::find($id);
        if ($shop) {
            $shop->delete();
            return redirect()->route('admin.shops')->with('success', 'Shop deleted successfully');
        } else {
            return redirect()->route('admin.shops')->with('error', 'Shop not found.');
        }
    }

}
