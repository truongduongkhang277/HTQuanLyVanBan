<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('layouts.dashboard');
    }

    public function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        } else {
            echo "Đăng nhập lỗi";
            exit;
        }
    }

    // chuyển về đăng nhập của người dùng
    public function logout(Request $request){
        // var_dump($request->email);exit;
        // Auth::guard('admin')->logout();
        // return redirect('admin/login');

        Auth::guard('web')->logout();
        return redirect('login');
    }
}
