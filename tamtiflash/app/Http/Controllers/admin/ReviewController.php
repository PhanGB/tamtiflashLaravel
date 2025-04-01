<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = DB::table('review')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->join('orders', 'review.id_order', '=', 'orders.id')
            ->select(
                'review.id as review_id',
                'review.review as review_content',
                'review.rate as rating',
                'review.status as review_status',
                'users.name as customer_name',
                'orders.id as order_id'
            )
            ->get();
        $data = [
            'reviews' => $reviews,
        ];
        return view('admin.review', $data);
    }
    public function approve($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->status = 1; // Set status to approved
            $review->save();
            return redirect()->back()->with('success', 'Đã duyệt đánh giá.');
        }
        return redirect()->back()->with('error', 'không tìm thấy đánh giá.');
    }
    public function hide($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->status = 2;
            $review->save();
            return redirect()->back()->with('success', 'Ẩn đánh giá thành công.');
        }
        return redirect()->back()->with('error', 'Không tìm thấy đánh giá.');
    }
    public function show($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->status = 1;
            $review->save();
            return redirect()->back()->with('success', 'Hiện đánh giá thành công.');
        }
        return redirect()->back()->with('error', 'không tìm thấy đánh giá.');
    }

}
