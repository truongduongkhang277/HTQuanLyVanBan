<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoPhanController;
use App\Http\Controllers\ChucDanhController;
use App\Http\Controllers\CoQuanController;
use App\Http\Controllers\DoKhanController;
use App\Http\Controllers\DoMatController;
use App\Http\Controllers\HinhThucChuyenController;
use App\Http\Controllers\HinhThucController;
use App\Http\Controllers\HinhThucLuuController;
use App\Http\Controllers\LinhVucController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TrangThaiController;
use App\Http\Controllers\VanBanDenController;
use App\Http\Controllers\VanBanDiController;

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

Route::get('/', function () {
    return view('master');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /** VD:
     * GET => chucDanh.index => danh sách
     * GET => chucDanh.create => form thêm mới
     * POST => chucDanh.store => khi submit form thêm mới
     * GET => chucDanh.show => xem chi tiết
     * GET => chucDanh.edit => hiển thị form edit
     * PUT => chucDanh.update => khi submit form edit
     * DELETE => chucDanh.destroy => khi xóa
     */

    Route::resources([
        'bophan'               => BoPhanController::class,
        'chucDanh'             => ChucDanhController::class,
        'coQuan'               => CoQuanController::class,
        'doKhan'               => DoKhanController::class,
        'doMat'                => DoMatController::class,
        'hinhThuc'             => HinhThucController::class,
        'hinhThucChuyen'       => HinhThucChuyenController::class,
        'hinhThucLuu'          => HinhThucLuuController::class,
        'linhVuc'              => LinhVucController::class,
        'nguoiDung'            => NguoiDungController::class,
        'theLoai'              => TheLoaiController::class,
        'trangThai'            => TrangThaiController::class,
        'vanBanDen'            => VanBanDenController::class,
        'vanBanDi'             => VanBanDiController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
