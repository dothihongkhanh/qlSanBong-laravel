<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permission;
use Carbon\Carbon; // Thêm dòng này


class RegisterOwnerController extends Controller
{
    public function showRegistrationOwnerForm()
    {
        return view('auth.registerOwner');
    }

    public function registerOwner(Request $request)
    {
        $request->validate([
            'username' => 'nullable',
            'phone_number' => 'sometimes|unique:user', // Sửa 'user' thành 'users'
            'password' => 'min:6',
        ]);

        // Sử dụng create() để tạo người dùng mới
        $user =User::create([
            'username' => $request->input('username'), // Đảm bảo rằng 'username' đã được cung cấp account_name
            'account_name' => 'Chưa cập nhật',
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password'),
            'address'=> 'Chưa cập nhật',
            'avt'=> 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $userPermission = new User_Permission();
        $userPermission->id_permission = 2;
        $userPermission->username = $user->username; 
        $userPermission->save();
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}