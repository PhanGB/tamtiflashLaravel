<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        $data = [
            'vouchers' => $vouchers,
        ];
        return view('admin.voucher', $data);
    }
    public function create()
    {
        return view('admin.add_voucher');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:voucher,code', // Ensure the code is unique
            'discount' => 'required|numeric|min:0|max:100', // Discount should be between 0 and 100%
            'max_discount' => 'required|numeric|min:0',
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after:start',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:0,1', // Status must be 0 or 1
        ]);

        try {
            // Create a new voucher
            $voucher = new Voucher();
            $voucher->name = $request->input('name');
            $voucher->code = $request->input('code');
            $voucher->value = $request->input('discount');
            $voucher->max_value = $request->input('max_discount');
            $voucher->start_date = $request->input('start');
            $voucher->end_date = $request->input('end');
            $voucher->quantity = $request->input('quantity');
            $voucher->status = $request->input('status');
            $voucher->save();

            // Redirect back with a success message
            return redirect()->route('admin.voucher.add-voucher')->with('success', 'Voucher added successfully!');
            // return view('admin/voucher');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error adding voucher: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to add voucher. Please try again.')->withInput();
        }
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id); // Tìm voucher
        $voucher->delete(); // Soft delete
        return redirect()->route('/voucher')->with('success', 'Voucher đã được xoá tạm thời.');
    }
}
