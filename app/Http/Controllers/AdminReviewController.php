<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $review = Review::OrderByDesc('id')->get();
        return view('admin.review.index', compact('review'));
    }

    public function delete($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('admin.get.list.review')->with('alert-success', 'Xoá đánh giá thành công.');
    }
}
