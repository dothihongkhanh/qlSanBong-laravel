<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permission;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ]);
    
        // Tạo người dùng mới
        $user = new User;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        $user->save();
    
        // Thêm quyền người dùng mặc định
        $userPermission = new User_Permission;
        $userPermission->id_permission = 3;
        $userPermission->username = $request->username; // Thêm username vào UserPermission
        $user->user_permissions()->save($userPermission);
    
        // Đăng ký thành công, chuyển hướng đến trang chủ hoặc trang thông báo thành công
        return redirect('/login')->with('success', 'Đăng ký thành công!');
    }
}
