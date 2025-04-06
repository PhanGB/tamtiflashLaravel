<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        // cập nhật trạng thái voucher
        if ($filter == 0) {
            $query->where('status', 0);
        } elseif ($filter == 1) {
            $query->where('status', 1);
        } elseif ($filter == 2) {
            $query->where('status', 2);
        }


        $vouchers = $query->get();

        // Cập nhật trạng thái nếu ngày hết hạn đã qua
        foreach ($vouchers as $voucher) {
            $endDate = Carbon::parse($voucher->end_date);
            if ($voucher->status == 1 && $endDate->isPast()) {
                $voucher->status = 0;
                $voucher->save();
            }
        }

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

    public function restore($id)
    {
        $voucher = Voucher::withTrashed()->findOrFail($id); // Tìm voucher đã bị xóa mềm
        $voucher->restore(); // Khôi phục voucher
        // Cập nhật trạng thái về 1 (đang hoạt động)
        $voucher->status = 1; // Đang hoạt động
        $voucher->save(); // Lưu thay đổi
        return redirect()->back()->with('success', 'Voucher đã được khôi phục thành công.');
    }


    public function view_edit($id)
    {
        $voucher = Voucher::findOrFail($id); // Tìm voucher
        return view('admin.edit_voucher', compact('voucher'));
    }




    public function update(Request $request)
    {
        try {

            // Validate dữ liệu
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50|unique:voucher,code,' . $request->id,
                'value' => 'required|numeric|min:0|max:100',
                'max_value' => 'required|numeric|min:0',
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
                'quantity' => 'required|integer|min:1',
                'status' => 'required|in:0,1',
            ]);

            $voucher = Voucher::findOrFail($request->id);

            $voucher->update([
                'name' => $request->name,
                'code' => $request->code,
                'value' => $request->value,
                'max_value' => $request->max_value,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);

            // Nếu ngày kết thúc đã qua => đổi trạng thái thành không hoạt động
            if (Carbon::parse($request->end_date)->isPast()) {
                $voucher->update(['status' => 0]);
            } else {
                $voucher->update(['status' => $request->status]);
            }


            return redirect()->back()->with('success', 'Voucher đã được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi cập nhật voucher: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function applyVoucher(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $voucherCode = $request->input('code');
        $user = auth()->user();

        // 1. Tìm voucher hợp lệ
        $voucher = Voucher::where('code', $voucherCode)
            ->where('quantity', '>', 0)
            ->where('status', 1)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        if (!$voucher) {
            return back()->withErrors(['code' => 'Mã giảm giá không hợp lệ hoặc đã hết']);
        }

        // 2. Kiểm tra user đã dùng voucher chưa
        if ($user->vouchers()->where('voucher_id', $voucher->id)->exists()) {
            return back()->withErrors(['code' => 'Bạn đã sử dụng mã giảm giá này rồi']);
        }

        // 3. Gắn voucher và cập nhật số lượng
        $user->vouchers()->attach($voucher->id, ['used_at' => now()]);
        $voucher->decrement('quantity');

        // 4. Thực hiện logic giảm giá đơn hàng ở đây nếu cần
        session([
            'voucher_discount' => $voucher->value,
            'voucher_code' => $voucher->code
        ]);

        return back()->with('success', 'Áp dụng mã giảm giá thành công!');
    }

}
