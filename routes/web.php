<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
})->name('home');

// khi truy cập các mục liên quan đến cơ quan thì dùng route này
Route::prefix('coQuan')->group(function(){
    
    // danh sách cơ quan, phương thức hiển thị
    Route::get('/',[CoQuanController::class, 'index'])->name('coQuan.index');

    // thêm mới cơ quan, phương thức thêm
    Route::get('/create',[CoQuanController::class, 'create'])->name('coQuan.create');

    // lưu trữ cơ quan vừa thêm, phương thức thêm
    Route::post('/store',[CoQuanController::class, 'store'])->name('coQuan.store');

    // chỉnh sửa cơ quan, phương thức chỉnh sửa
    Route::get('/edit/{id}',[CoQuanController::class, 'edit'])->name('coQuan.edit');
    
    // lưu thông tin cơ quan vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[CoQuanController::class, 'update'])->name('coQuan.update');

    // xóa cơ quan, phương thức xóa
    Route::get('/delete/{id}',[CoQuanController::class, 'destroy'])->name('coQuan.delete');
});

// Route::get('/404', [App\Http\Controllers\HomeController::class, 'error_page']);

// Route::group(['prefix' => 'admin'], function(){
//     Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');      

//     /** VD:
//      * GET => chucDanh.index => danh sách
//      * GET => chucDanh.create => form thêm mới
//      * POST => chucDanh.store => khi submit form thêm mới
//      * GET => chucDanh.show => xem chi tiết
//      * GET => chucDanh.edit => hiển thị form edit
//      * PUT => chucDanh.update => khi submit form edit
//      * DELETE => chucDanh.destroy => khi xóa
//      */

//     Route::resources([
//         'bophan'               => BoPhanController::class,
//         'chucDanh'             => ChucDanhController::class,
//         'coQuan'               => CoQuanController::class,
//         'doKhan'               => DoKhanController::class,
//         'doMat'                => DoMatController::class,
//         'hinhThuc'             => HinhThucController::class,
//         'hinhThucChuyen'       => HinhThucChuyenController::class,
//         'hinhThucLuu'          => HinhThucLuuController::class,
//         'linhVuc'              => LinhVucController::class,
//         'nguoiDung'            => NguoiDungController::class,
//         'theLoai'              => TheLoaiController::class,
//         'trangThai'            => TrangThaiController::class,
//         'vanBanDen'            => VanBanDenController::class,
//         'vanBanDi'             => VanBanDiController::class,
//     ]);
// });

// Auth::routes();
