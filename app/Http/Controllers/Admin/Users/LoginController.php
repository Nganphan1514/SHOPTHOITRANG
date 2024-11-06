<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('admin.users.login', ['title' => 'Dang nhap he thong']);
    }

    public function store(Request $request)
    {
        // Sửa quy tắc email
        $this->validate($request, [
            'email' => 'required|email:filter', // Sử dụng email:filter để kiểm tra định dạng email
            'password' => 'required'
        ]);

        // Thử đăng nhập
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // 'level' => 1 // Thêm điều kiện level = 1
        ], $request->has('remember'))) { // Dùng $request->has thay vì input để kiểm tra checkbox remember
            return redirect()->route('admin'); // Đảm bảo route 'admin' đã tồn tại trong web.php
        }

        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        return redirect()->back();
    }
}
