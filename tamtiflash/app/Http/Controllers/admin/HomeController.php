<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $complaintsCount = Review::complaints()->count();

        $goodReviewsCount = Review::goodReviews()->count();

        return view('admin.home', [
            'complaintsCount' => $complaintsCount,
            'goodReviewsCount' => $goodReviewsCount,
        ]);
    }
}
