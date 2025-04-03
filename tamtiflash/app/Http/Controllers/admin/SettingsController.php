<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Banking;
use App\Models\Admin\Shipping_fee;
use Illuminate\Http\Request;
class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }
    public function payment_method()
    {
        return view('admin.payment_method');
    }
    public function edit_payment()
    {
        $banking = Banking::first();
        $data = [
            'banking' => $banking,
        ];
        return view('admin.edit_payment', $data);
    }
    public function update_payment(Request $request)
    {
        $request->validate([
            'bankName' => 'required|string|max:255',
            'accountNumber' => 'required|string|max:100',
            'accountHolder' => 'required|string|max:255',
            'qrCode' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $banking = Banking::firstOrNew([]);

        if ($request->hasFile('qrCode')) {
            if ($banking->qr_img && file_exists(public_path($banking->qr_img))) {
                unlink(public_path($banking->qr_img));
            }

            $file = $request->file('qrCode');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/bank'), $filename);
            $banking->qr_img = $filename;
        }

        $banking->name_bank = $request->bankName;
        $banking->acc_number = $request->accountNumber;
        $banking->name = $request->accountHolder;
        $banking->save();

        return redirect()->route('admin.payment_method')
            ->with('success', 'Cập nhật thông tin chuyển khoản thành công!');
    }
    public function shipping_fee()
    {
        $shippingFees = Shipping_fee::all();
        $data = [
            'shippingFees' => $shippingFees,
        ];
        return view('admin.shipping_fee', $data);
    }
    public function edit_shipping($id)
    {
        $shippingFee = Shipping_fee::findOrFail($id);
        $data = [
            'shippingFee' => $shippingFee,
        ];
        return view('admin.edit_shipping', $data);
    }
    public function update_shipping(Request $request)
    {
        $request->validate([
        'id' => 'exists:shipping_fee,id',
        'min_distance' => 'numeric|min:0',
        'max_distance' => 'numeric|min:0|gt:min_distance',
        'base_price' => 'numeric|min:0',
        'extra_price_per_km' => 'numeric|min:0',
        ]);

        $shippingFee = Shipping_fee::findOrFail($request->id);
        $shippingFee->min_distance = $request->min_distance;
        $shippingFee->max_distance = $request->max_distance;
        $shippingFee->base_price = $request->base_price;
        $shippingFee->extra_price_per_km = $request->extra_price_per_km;
        $shippingFee->save();

        return redirect()->route('admin.shipping_fee')
            ->with('success', 'Cập nhật phí vận chuyển thành công!');
    }
}
