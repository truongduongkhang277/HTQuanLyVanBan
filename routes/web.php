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
// đăng nhập
Route::get('/', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/', [AdminController::class, 'postLoginAdmin']);

Route::get('/home', function(){
    return view('home');
})->name('home');

// khi truy cập các mục liên quan đến bộ phận thì dùng route này
Route::prefix('boPhan')->group(function(){    
    // danh sách bộ phận, phương thức hiển thị
    Route::get('/',[BoPhanController::class, 'index'])->name('boPhan.index');
    // thêm mới bộ phận, phương thức thêm
    Route::get('/create',[BoPhanController::class, 'create'])->name('boPhan.create');
    // lưu trữ bộ phận vừa thêm, phương thức thêm
    Route::post('/store',[BoPhanController::class, 'store'])->name('boPhan.store');
    // chỉnh sửa bộ phận, phương thức chỉnh sửa
    Route::get('/edit/{id}',[BoPhanController::class, 'edit'])->name('boPhan.edit');    
    // lưu thông tin bộ phận vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[BoPhanController::class, 'update'])->name('boPhan.update');
    // xóa bộ phận, phương thức xóa
    Route::get('/delete/{id}',[BoPhanController::class, 'destroy'])->name('boPhan.delete');
});

// khi truy cập các mục liên quan đến chức danh thì dùng route này
Route::prefix('chucDanh')->group(function(){    
    // danh sách chức danh, phương thức hiển thị
    Route::get('/',[ChucDanhController::class, 'index'])->name('chucDanh.index');
    // thêm mới chức danh, phương thức thêm
    Route::get('/create',[ChucDanhController::class, 'create'])->name('chucDanh.create');
    // lưu trữ chức danh vừa thêm, phương thức thêm
    Route::post('/store',[ChucDanhController::class, 'store'])->name('chucDanh.store');
    // chỉnh sửa chức danh, phương thức chỉnh sửa
    Route::get('/edit/{id}',[ChucDanhController::class, 'edit'])->name('chucDanh.edit');    
    // lưu thông tin chức danh vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[ChucDanhController::class, 'update'])->name('chucDanh.update');
    // xóa chức danh, phương thức xóa
    Route::get('/delete/{id}',[ChucDanhController::class, 'destroy'])->name('chucDanh.delete');
});

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

// khi truy cập các mục liên quan đến độ khẩn thì dùng route này
Route::prefix('doKhan')->group(function(){    
    // danh sách độ khẩn, phương thức hiển thị
    Route::get('/',[DoKhanController::class, 'index'])->name('doKhan.index');
    // thêm mới độ khẩn, phương thức thêm
    Route::get('/create',[DoKhanController::class, 'create'])->name('doKhan.create');
    // lưu trữ độ khẩn vừa thêm, phương thức thêm
    Route::post('/store',[DoKhanController::class, 'store'])->name('doKhan.store');
    // chỉnh sửa độ khẩn, phương thức chỉnh sửa
    Route::get('/edit/{id}',[DoKhanController::class, 'edit'])->name('doKhan.edit');    
    // lưu thông tin độ khẩn vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[DoKhanController::class, 'update'])->name('doKhan.update');
    // xóa độ khẩn, phương thức xóa
    Route::get('/delete/{id}',[DoKhanController::class, 'destroy'])->name('doKhan.delete');
});

// khi truy cập các mục liên quan đến độ mật thì dùng route này
Route::prefix('doMat')->group(function(){
    // danh sách độ mật, phương thức hiển thị
    Route::get('/',[DoMatController::class, 'index'])->name('doMat.index');
    // thêm mới độ mật, phương thức thêm
    Route::get('/create',[DoMatController::class, 'create'])->name('doMat.create');
    // lưu trữ độ mật vừa thêm, phương thức thêm
    Route::post('/store',[DoMatController::class, 'store'])->name('doMat.store');
    // chỉnh sửa độ mật, phương thức chỉnh sửa
    Route::get('/edit/{id}',[DoMatController::class, 'edit'])->name('doMat.edit');    
    // lưu thông tin độ mật vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[DoMatController::class, 'update'])->name('doMat.update');
    // xóa độ mật, phương thức xóa
    Route::get('/delete/{id}',[DoMatController::class, 'destroy'])->name('doMat.delete');
});

// khi truy cập các mục liên quan đến hình thức thì dùng route này
Route::prefix('hinhThuc')->group(function(){    
    // danh sách hình thức, phương thức hiển thị
    Route::get('/',[HinhThucController::class, 'index'])->name('hinhThuc.index');
    // thêm mới hình thức, phương thức thêm
    Route::get('/create',[HinhThucController::class, 'create'])->name('hinhThuc.create');
    // lưu trữ hình thức vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucController::class, 'store'])->name('hinhThuc.store');
    // chỉnh sửa hình thức, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucController::class, 'edit'])->name('hinhThuc.edit');    
    // lưu thông tin hình thức vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucController::class, 'update'])->name('hinhThuc.update');
    // xóa hình thức, phương thức xóa
    Route::get('/delete/{id}',[HinhThucController::class, 'destroy'])->name('hinhThuc.delete');
});

// khi truy cập các mục liên quan đến hình thức chuyển thì dùng route này
Route::prefix('hinhThucChuyen')->group(function(){    
    // danh sách hình thức chuyển, phương thức hiển thị
    Route::get('/',[HinhThucChuyenController::class, 'index'])->name('hinhThucChuyen.index');
    // thêm mới hình thức chuyển, phương thức thêm
    Route::get('/create',[HinhThucChuyenController::class, 'create'])->name('hinhThucChuyen.create');
    // lưu trữ hình thức chuyển vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucChuyenController::class, 'store'])->name('hinhThucChuyen.store');
    // chỉnh sửa hình thức chuyển, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucChuyenController::class, 'edit'])->name('hinhThucChuyen.edit');    
    // lưu thông tin hình thức chuyển vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucChuyenController::class, 'update'])->name('hinhThucChuyen.update');
    // xóa hình thức chuyển, phương thức xóa
    Route::get('/delete/{id}',[HinhThucChuyenController::class, 'destroy'])->name('hinhThucChuyen.delete');
});

// khi truy cập các mục liên quan đến hình thức lưu thì dùng route này
Route::prefix('hinhThucLuu')->group(function(){    
    // danh sách hình thức lưu, phương thức hiển thị
    Route::get('/',[HinhThucLuuController::class, 'index'])->name('hinhThucLuu.index');
    // thêm mới hình thức lưu, phương thức thêm
    Route::get('/create',[HinhThucLuuController::class, 'create'])->name('hinhThucLuu.create');
    // lưu trữ hình thức lưu vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucLuuController::class, 'store'])->name('hinhThucLuu.store');
    // chỉnh sửa hình thức lưu, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucLuuController::class, 'edit'])->name('hinhThucLuu.edit');    
    // lưu thông tin hình thức lưu vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucLuuController::class, 'update'])->name('hinhThucLuu.update');
    // xóa hình thức lưu, phương thức xóa
    Route::get('/delete/{id}',[HinhThucLuuController::class, 'destroy'])->name('hinhThucLuu.delete');
});

// khi truy cập các mục liên quan đến lĩnh vực thì dùng route này
Route::prefix('linhVuc')->group(function(){    
    // danh sách lĩnh vực, phương thức hiển thị
    Route::get('/',[LinhVucController::class, 'index'])->name('linhVuc.index');
    // thêm mới lĩnh vực, phương thức thêm
    Route::get('/create',[LinhVucController::class, 'create'])->name('linhVuc.create');
    // lưu trữ lĩnh vực vừa thêm, phương thức thêm
    Route::post('/store',[LinhVucController::class, 'store'])->name('linhVuc.store');
    // chỉnh sửa lĩnh vực, phương thức chỉnh sửa
    Route::get('/edit/{id}',[LinhVucController::class, 'edit'])->name('linhVuc.edit');    
    // lưu thông tin lĩnh vực vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[LinhVucController::class, 'update'])->name('linhVuc.update');
    // xóa lĩnh vực, phương thức xóa
    Route::get('/delete/{id}',[LinhVucController::class, 'destroy'])->name('linhVuc.delete');
});

// khi truy cập các mục liên quan đến tài khoản người dùng thì dùng route này
Route::prefix('nguoiDung')->group(function(){    
    // danh sách tài khoản người dùng, phương thức hiển thị
    Route::get('/',[NguoiDungController::class, 'index'])->name('nguoiDung.index');
    // thêm mới tài khoản người dùng, phương thức thêm
    Route::get('/create',[NguoiDungController::class, 'create'])->name('nguoiDung.create');
    // lưu trữ tài khoản người dùng vừa thêm, phương thức thêm
    Route::post('/store',[NguoiDungController::class, 'store'])->name('nguoiDung.store');
    // chỉnh sửa tài khoản người dùng, phương thức chỉnh sửa
    Route::get('/edit/{id}',[NguoiDungController::class, 'edit'])->name('nguoiDung.edit');    
    // lưu thông tin tài khoản người dùng vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[NguoiDungController::class, 'update'])->name('nguoiDung.update');
    // xóa tài khoản người dùng, phương thức xóa
    Route::get('/delete/{id}',[NguoiDungController::class, 'destroy'])->name('nguoiDung.delete');
});

// khi truy cập các mục liên quan đến thể loại thì dùng route này
Route::prefix('theLoai')->group(function(){    
    // danh sách thể loại, phương thức hiển thị
    Route::get('/',[TheLoaiController::class, 'index'])->name('theLoai.index');
    // thêm mới thể loại, phương thức thêm
    Route::get('/create',[TheLoaiController::class, 'create'])->name('theLoai.create');
    // lưu trữ thể loại vừa thêm, phương thức thêm
    Route::post('/store',[TheLoaiController::class, 'store'])->name('theLoai.store');
    // chỉnh sửa thể loại, phương thức chỉnh sửa
    Route::get('/edit/{id}',[TheLoaiController::class, 'edit'])->name('theLoai.edit');    
    // lưu thông tin thể loại vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[TheLoaiController::class, 'update'])->name('theLoai.update');
    // xóa thể loại, phương thức xóa
    Route::get('/delete/{id}',[TheLoaiController::class, 'destroy'])->name('theLoai.delete');
});

// khi truy cập các mục liên quan đến trạng thái thì dùng route này
Route::prefix('trangThai')->group(function(){    
    // danh sách trạng thái, phương thức hiển thị
    Route::get('/',[TrangThaiController::class, 'index'])->name('trangThai.index');
    // thêm mới trạng thái, phương thức thêm
    Route::get('/create',[TrangThaiController::class, 'create'])->name('trangThai.create');
    // lưu trữ trạng thái vừa thêm, phương thức thêm
    Route::post('/store',[TrangThaiController::class, 'store'])->name('trangThai.store');
    // chỉnh sửa trạng thái, phương thức chỉnh sửa
    Route::get('/edit/{id}',[TrangThaiController::class, 'edit'])->name('trangThai.edit');    
    // lưu thông tin trạng thái vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[TrangThaiController::class, 'update'])->name('trangThai.update');
    // xóa trạng thái, phương thức xóa
    Route::get('/delete/{id}',[TrangThaiController::class, 'destroy'])->name('trangThai.delete');
});

// khi truy cập các mục liên quan đến văn bản đến thì dùng route này
Route::prefix('vanBanDen')->group(function(){    
    // danh sách văn bản đến, phương thức hiển thị
    Route::get('/',[VanBanDenController::class, 'index'])->name('vanBanDen.index');
    // thêm mới văn bản đến, phương thức thêm
    Route::get('/create',[VanBanDenController::class, 'create'])->name('vanBanDen.create');
    // lưu trữ văn bản đến vừa thêm, phương thức thêm
    Route::post('/store',[VanBanDenController::class, 'store'])->name('vanBanDen.store');
    // chỉnh sửa văn bản đến, phương thức chỉnh sửa
    Route::get('/edit/{id}',[VanBanDenController::class, 'edit'])->name('vanBanDen.edit');    
    // lưu thông tin văn bản đến vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[VanBanDenController::class, 'update'])->name('vanBanDen.update');
    // xóa văn bản đến, phương thức xóa
    Route::get('/delete/{id}',[VanBanDenController::class, 'destroy'])->name('vanBanDen.delete');
});

// khi truy cập các mục liên quan đến văn bản đi thì dùng route này
Route::prefix('vanBanDi')->group(function(){    
    // danh sách văn bản đi, phương thức hiển thị
    Route::get('/',[VanBanDiController::class, 'index'])->name('vanBanDi.index');
    // thêm mới văn bản đi, phương thức thêm
    Route::get('/create',[VanBanDiController::class, 'create'])->name('vanBanDi.create');
    // lưu trữ văn bản đi vừa thêm, phương thức thêm
    Route::post('/store',[VanBanDiController::class, 'store'])->name('vanBanDi.store');
    // chỉnh sửa văn bản đi, phương thức chỉnh sửa
    Route::get('/edit/{id}',[VanBanDiController::class, 'edit'])->name('vanBanDi.edit');    
    // lưu thông tin văn bản đi vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[VanBanDiController::class, 'update'])->name('vanBanDi.update');
    // xóa văn bản đi, phương thức xóa
    Route::get('/delete/{id}',[VanBanDiController::class, 'destroy'])->name('vanBanDi.delete');
});