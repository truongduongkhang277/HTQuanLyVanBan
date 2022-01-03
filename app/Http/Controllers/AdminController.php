<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect()->route('login');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    // chuyển về đăng nhập của người dùng
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
