<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_permission;

class LoginController extends Controller
{
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            if ($request->password === $user->password) {
                session()->put('username', $request->username);
                $userPermission = User_permission::where('username', $request->username)->first();

                if ($userPermission) {
                    $idPermission = $userPermission->id_permission;

                    switch ($idPermission) {
                        case 1:
                            return redirect()->route('admin_home');
                        case 2:
                            return redirect()->route('owner_home');
                        case 3:
                            return redirect('');
                        default:
                            return back()->with('fail', 'Không có quyền truy cập');
                    }
                } else {
                    return back()->with('fail', 'Không có quyền truy cập');
                }
            } else {
                return back()->with('fail', 'Mật khẩu không đúng');
            }
        } else {
            return back()->with('fail', 'Tên đăng nhập không đúng');
        }
    }

    public function dashboard_client()
    {
        return view('client.index'); // Thay đổi view tương ứng
    }

    public function dashboard_owner()
    {
        return view('owner.index'); // Thay đổi view tương ứng
    }

    public function dashboard_admin()
    {
        return view('admin.index'); // Thay đổi view tương ứng
    }
}
