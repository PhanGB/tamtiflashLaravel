<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    // public function index()
    // {
    //     $vouchers = Voucher::all();
    //     $data = [
    //         'vouchers' => $vouchers,
    //     ];
    //     return view('admin.voucher', $data);
    // }
    public function index(Request $request)
    {
        $filter = $request->input('filter', 3); // Mặc định là 3 (tất cả)

        $query = Voucher::query();

        if ($filter == 1) {
            $query->where('status', 1); // Đang hoạt động
        } elseif ($filter == 0) {
            $query->where('status', 0); // Ngừng hoạt động
        } elseif ($filter == 2) {
            $query->onlyTrashed(); // Chỉ lấy những voucher đã bị xóa mềm
        }

        $vouchers = $query->get();

        return view('admin.voucher', compact('vouchers', 'filter'));
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
            // return redirect()->back()->with('success', 'Thêm voucher thành công!')->withInput();
            return response()->json([
                'success' => true,
                'message' => 'Voucher đã được thêm thành công!'
            ]);
            // return view('admin/voucher');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error adding voucher: ' . $e->getMessage());

            // Redirect back with an error message
            // return redirect()->back()->with('error', 'Failed to add voucher. Please try again.')->withInput();
            return response()->json([
                'success' => false,
                'message' => 'Thêm voucher thất bại, vui lòng thử lại sau!'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id); // Tìm voucher
        // chuyển trang thái thành 2
        $voucher->status = 2; // Ngừng hoạt động
        $voucher->save();
        // Xoá mềm
        $voucher->delete(); // Soft delete
        // return redirect()->route('/voucher')->with('success', 'Voucher đã được xoá tạm thời.');
        return redirect()->back()->with('success', 'Voucher đã được xoá tạm thời.');
    }
}
