<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

Route::get('lienLac', [HomeController::class, 'lienLac'])->name('lienLac');

Route::get('/home', function(){
    return view('home');
})->name('home');
