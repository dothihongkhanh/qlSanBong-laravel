<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permission;
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
        User::create([
            'username' => $request->input('username'), // Đảm bảo rằng 'username' đã được cung cấp account_name
            'account_name' => $request->input('username'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            'address'=> $request->input('username'),
            'avt'=>$request->input('username'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $userPermission = new User_Permission();
        $userPermission->id_permission = 3;
        $userPermission->username = $request->input('username');
        $userPermission->save();
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}