<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có role là 1
        if (Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
            return $next($request); // Tiếp tục truy cập
        }

            return redirect()->route('login')->with('error', 'Tài khoản của bạn không có quyền truy cập vào Admin hãy thử lại với tài khoản khác!');
        }
    
}
