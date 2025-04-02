<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopsController extends Controller
{
    public function index()
    {
        $shops =Shop::all();
        $search = request('search');
        if ($search){
            $shops = Shop::where('name','like','%'.$search.'%')->get();
        }
        return view('admin.shops',compact('shops'));
    }
    public function add_shop(){

        return view('admin.add_shop');
    }
    public function add(){
        $shop = new Shop();
        $shop->name = request('name');
        $shop->image = request('image');
        $shop->rate = request('rate');
        $shop->short_description = request('short_description');
        $shop->time_open = request('time_open');
        $shop->time_close = request('time_close');
        $shop->address_link = request('address');
        $shop->status = request('status');
        $shop->save();

        return redirect()->route('admin.shops')->with('success', 'Shop thêm thành công');
    }
    public function edit_shop($id){
        $shop = Shop::find($id);
        return view('admin.edit_shop',compact('shop'));
    }
    public function edit(Request $request ,$id){
        $shop = Shop::findOrFail($id);
        $shop->update([
        'name' => $request->name,
        'image' => $request->image,
        'rate' => $request->rate,
        'short_description' => $request->short_description,
        'time_open' => $request->time_open,
        'time_close' => $request->time_close,
        'address' => $request->address_link,
        'status' => $request->status,
    ]);
    return redirect()->route('admin.shops')->with('success', 'Cập nhật thành công!');

    }
    public function delete($id)
    {
        $shop = Shop::find($id);
        if ($shop) {
            $shop->delete();
            return redirect()->route('admin.shops')->with('success', 'Shop xóa thành công.');
        } else {
            return redirect()->route('admin.shops')->with('error', 'Shop xóa thất bại.');
        }
    }

}
