<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User ;
use App\Models\User_permission;
use App\Http\Controllers\Auth\Auth;

class LoginController extends Controller
{
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
                        return redirect('admin home page')->with('username', $request->username);
                    case 2:
                        return redirect('owner home page')->with('username', $request->username);
                    case 3:
                        return redirect('')->with('username', $request->username);
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
            return view('');
        }
        public function dashboard_owner()
        {
            return view('owner.index');
        }
        public function dashboard_admin()
        {
            return view('admin.index');
        }

    // 
    public function logout()
    {
        // Đăng xuất người dùng
        auth()->logout();
        session()->flush();
        
        return redirect()->route('login');
    }   
   
}
