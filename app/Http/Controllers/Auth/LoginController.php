<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Models\User;
use App\Models\User as ModelsUser;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $user = ModelsUser::where ('username','=',$request->username)->first();
    //     if($user){
    //         if(hash::check($request->password,$user->password)){
    //             $request->session()->put('loginId',$user->id);
    //             return redirect('dashboard');
    //         } else {
    //              return back()->with('fail','Mật khẩu không đúng');
    //         }
    // } else {
    //     return back()->with('fail','Tên đăng nhập không đúng');
    //     }
    // }
    if ($user) {
        if ($request->password === $user->password) {
            $request->session()->put('loginId', $user->id);
            return redirect('client home page');
        } else {
            return back()->with('fail', 'Mật khẩu không đúng');
        }
    } else {
        return back()->with('fail', 'Tên đăng nhập không đúng');
    }}
    

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
