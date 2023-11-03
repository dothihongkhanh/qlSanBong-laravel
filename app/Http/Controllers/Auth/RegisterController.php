<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_permission;
use Carbon\Carbon; // Thêm dòng này


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'nullable',
            'phone_number' => 'sometimes|unique:user', // Sửa 'user' thành 'users'
            'password' => 'min:6',
        ]);

        // Sử dụng create() để tạo người dùng mới
        $user = User::create([
            'username' => $request->input('username'), // Đảm bảo rằng 'username' đã được cung cấp account_name
            'account_name' => 'Chưa cập nhật',
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            'address' => 'Chưa cập nhật',
            'avt' => 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $userPermission = new User_permission();
        $userPermission->id_permission = 3;
        $userPermission->username = $user->username;
        $userPermission->save();
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}
