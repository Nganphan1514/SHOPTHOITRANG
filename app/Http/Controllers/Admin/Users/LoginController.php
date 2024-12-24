<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            $user = Auth::user();
    
            // Kiểm tra roleid
            if ($user->role_id == 1 || $user->role_id == 3) {
                return redirect()->route('admin'); // Trang dashboard cho admin
            } elseif ($user->role_id == 2) {
                return redirect()->route('home1'); // Trang chủ cho user
            }
    
            // Trường hợp không xác định roleid
            Auth::logout();
            Session::flash('error', 'Role không hợp lệ.');
            return redirect()->route('login');
        }
    
        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}
