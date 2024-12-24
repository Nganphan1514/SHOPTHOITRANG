<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Reply;


class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Kiểm tra product_id có tồn tại trong bảng products
            'comment' => 'required|string|max:255', // Không cần rating nữa
        ]);

        Review::create([
            'product_id' => $request->product_id, // Liên kết đến id của sản phẩm
            'user_id' => auth()->id(), // Lấy id của người dùng đăng nhập
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Câu hỏi của bạn đã được gửi!');
    }
    public function reply(Request $request, $reviewId)
    {
        $request->validate([
            'reply' => 'required|string|max:255',
        ]);

        $reply = new Reply();
        $reply->reviews_id = $reviewId; // Sử dụng reviews_id thay vì review_id
        $reply->user_id = auth()->id(); // Sử dụng user_id
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back()->with('success', 'Câu trả lời đã được gửi.');
    }
}
