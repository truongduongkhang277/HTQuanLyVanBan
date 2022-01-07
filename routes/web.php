<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// đăng nhập
Route::get('/', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/', [AdminController::class, 'postLoginAdmin']);
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

//quên mật khẩu -- reset mật khẩu
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

// thông tin liên hệ
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// thông tin cá nhân
Route::get('profile', [HomeController::class, 'profile'])->name('profile');

// trang chủ
Route::get('/home', function(){
    return view('home');
})->name('home');
