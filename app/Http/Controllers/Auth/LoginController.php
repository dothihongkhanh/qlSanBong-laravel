<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Models\User ;
use App\Models\User_permission;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    // Tìm người dùng dựa trên username
    $user = User::where('username', $request->username)->first();

    if ($user) {
        // Kiểm tra mật khẩu
        if ($request->password === $user->password) {
            // Lấy thông tin quyền (id_permission) từ mối quan hệ userPermission
            $userPermission = User_permission::where('username', $request->username)->first();

            if ($userPermission) {
                $idPermission = $userPermission->id_permission;

                // Xác định trang chuyển hướng dựa trên id_permission
                switch ($idPermission) {
                    case 1:
                        return redirect('admin home page');
                    case 2:
                        return redirect('owner home page');
                    case 3:
                        return redirect('client home page');
                    default:
                        // Xử lý trường hợp không xác định
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
            return view('auth.home_client');
        }
        public function dashboard_owner()
        {
            return view('owner.index');
        }
        public function dashboard_admin()
        {
            return view('admin.index');
        }
        
}
