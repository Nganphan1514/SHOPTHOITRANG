<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Thêm người dùng mới
    public function insert($request)
    {
        try {
            // Lấy các trường từ request
            $data = $request->only(['name', 'email', 'password', 'role_id', 'status']);
            
            // Hash mật khẩu trước khi lưu
            $data['password'] = Hash::make($data['password']);
            
            // Gán giá trị mặc định cho 'status' nếu không có
            $data['status'] = $data['status'] ?? 1;
            
            // Tạo người dùng mới
            User::create($data);
    
            Session::flash('success', 'Thêm người dùng mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm người dùng lỗi');
            Log::error($err->getMessage());
    
            return false;
        }
    
        return true;
    }
    

    // Lấy danh sách người dùng (phân trang)
    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    // Cập nhật thông tin người dùng
    public function update($request, $user)
    {
        try {
            $data = $request->only(['name', 'email', 'password', 'role_id']);

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            }

            $user->fill($data);
            $user->save();

            Session::flash('success', 'Cập nhật người dùng thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật người dùng lỗi');
            Log::error($err->getMessage());

            return false;
        }

        return true;
    }

    // Xóa người dùng
    // public function destroy($request)
    // {
    //     try {
    //         $user = User::where('id', $request->input('id'))->first();

    //         if ($user) {
    //             $user->delete();
    //             Session::flash('success', 'Xóa người dùng thành công');
    //             return true;
    //         }
    //     } catch (\Exception $err) {
    //         Session::flash('error', 'Xóa người dùng lỗi');
    //         Log::error($err->getMessage());

    //         return false;
    //     }

    //     return false;
    // }
    public function destroy($id)
{
    $user = User::find($id);
    if (!$user) {
        return false; // Người dùng không tồn tại
    }

    $user->delete();
    return true; // Xóa thành công
}


    // Lấy thông tin người dùng theo ID
    public function show($id)
    {
        return User::find($id);
    }
}
