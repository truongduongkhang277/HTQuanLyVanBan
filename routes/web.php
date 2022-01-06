<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoPhanController;
use App\Http\Controllers\VaiTroController;
use App\Http\Controllers\CoQuanController;
use App\Http\Controllers\DoKhanController;
use App\Http\Controllers\DoMatController;
use App\Http\Controllers\HinhThucChuyenController;
use App\Http\Controllers\HinhThucController;
use App\Http\Controllers\HinhThucLuuController;
use App\Http\Controllers\LinhVucController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\QuyenTruyCapController;
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
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/home', function(){
    return view('home');
})->name('home');

// khi truy cập các mục liên quan đến bộ phận thì dùng route này
Route::prefix('boPhan')->group(function(){    
    // danh sách bộ phận, phương thức hiển thị
    Route::get('/',[BoPhanController::class, 'index'])->name('boPhan.index')->middleware('can:danh-sach-bo-phan');
    // thêm mới bộ phận, phương thức thêm
    Route::get('/create',[BoPhanController::class, 'create'])->name('boPhan.create')->middleware('can:them-bo-phan');
    // lưu trữ bộ phận vừa thêm, phương thức thêm
    Route::post('/store',[BoPhanController::class, 'store'])->name('boPhan.store');
    // hiển thị bộ phận, phương thức hiển thị
    Route::get('/show/{id}',[BoPhanController::class, 'show'])->name('boPhan.show'); 
    // chỉnh sửa bộ phận, phương thức chỉnh sửa
    Route::get('/edit/{id}',[BoPhanController::class, 'edit'])->name('boPhan.edit')->middleware('can:sua-bo-phan');    
    // lưu thông tin bộ phận vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[BoPhanController::class, 'update'])->name('boPhan.update');
    // xóa bộ phận, phương thức xóa
    Route::get('/delete/{id}',[BoPhanController::class, 'destroy'])->name('boPhan.delete')->middleware('can:xoa-bo-phan');
});

// khi truy cập các mục liên quan đến vai trò thì dùng route này
Route::prefix('vaiTro')->group(function(){    
    // danh sách vai trò, phương thức hiển thị
    Route::get('/',[VaiTroController::class, 'index'])->name('vaiTro.index')->middleware('can:danh-sach-vai-tro');
    // thêm mới vai trò, phương thức thêm
    Route::get('/create',[VaiTroController::class, 'create'])->name('vaiTro.create')->middleware('can:them-vai-tro');
    // lưu trữ vai trò vừa thêm, phương thức thêm
    Route::post('/store',[VaiTroController::class, 'store'])->name('vaiTro.store');
    // hiển thị vai trò, phương thức hiển thị
    Route::get('/show/{id}',[VaiTroController::class, 'show'])->name('vaiTro.show'); 
    // chỉnh sửa vai trò, phương thức chỉnh sửa
    Route::get('/edit/{id}',[VaiTroController::class, 'edit'])->name('vaiTro.edit')->middleware('can:sua-vai-tro');    
    // lưu thông tin vai trò vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[VaiTroController::class, 'update'])->name('vaiTro.update');
    // xóa vai trò, phương thức xóa
    Route::get('/delete/{id}',[VaiTroController::class, 'destroy'])->name('vaiTro.delete')->middleware('can:xoa-vai-tro');
});

// khi truy cập các mục liên quan đến cơ quan thì dùng route này
Route::prefix('coQuan')->group(function(){    
    // danh sách cơ quan, phương thức hiển thị
    Route::get('/',[CoQuanController::class, 'index'])->name('coQuan.index')->middleware('can:danh-sach-co-quan');
    // thêm mới cơ quan, phương thức thêm
    Route::get('/create',[CoQuanController::class, 'create'])->name('coQuan.create')->middleware('can:them-co-quan');
    // lưu trữ cơ quan vừa thêm, phương thức thêm
    Route::post('/store',[CoQuanController::class, 'store'])->name('coQuan.store');
    // hiển thị cơ quan, phương thức hiển thị
    Route::get('/show/{id}',[CoQuanController::class, 'show'])->name('coQuan.show'); 
    // chỉnh sửa cơ quan, phương thức chỉnh sửa
    Route::get('/edit/{id}',[CoQuanController::class, 'edit'])->name('coQuan.edit')->middleware('can:sua-co-quan');    
    // lưu thông tin cơ quan vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[CoQuanController::class, 'update'])->name('coQuan.update');
    // xóa cơ quan, phương thức xóa
    Route::get('/delete/{id}',[CoQuanController::class, 'destroy'])->name('coQuan.delete')->middleware('can:xoa-co-quan');
});

// khi truy cập các mục liên quan đến độ khẩn thì dùng route này
Route::prefix('doKhan')->group(function(){    
    // danh sách độ khẩn, phương thức hiển thị
    Route::get('/',[DoKhanController::class, 'index'])->name('doKhan.index')->middleware('can:danh-sach-do-khan');
    // thêm mới độ khẩn, phương thức thêm
    Route::get('/create',[DoKhanController::class, 'create'])->name('doKhan.create')->middleware('can:them-do-khan');
    // lưu trữ độ khẩn vừa thêm, phương thức thêm
    Route::post('/store',[DoKhanController::class, 'store'])->name('doKhan.store');
    // hiển thị độ khẩn, phương thức hiển thị
    Route::get('/show/{id}',[DoKhanController::class, 'show'])->name('doKhan.show'); 
    // chỉnh sửa độ khẩn, phương thức chỉnh sửa
    Route::get('/edit/{id}',[DoKhanController::class, 'edit'])->name('doKhan.edit')->middleware('can:sua-do-khan');    
    // lưu thông tin độ khẩn vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[DoKhanController::class, 'update'])->name('doKhan.update');
    // xóa độ khẩn, phương thức xóa
    Route::get('/delete/{id}',[DoKhanController::class, 'destroy'])->name('doKhan.delete')->middleware('can:xoa-do-khan');
});

// khi truy cập các mục liên quan đến độ mật thì dùng route này
Route::prefix('doMat')->group(function(){
    // danh sách độ mật, phương thức hiển thị
    Route::get('/',[DoMatController::class, 'index'])->name('doMat.index')->middleware('can:danh-sach-do-mat');
    // thêm mới độ mật, phương thức thêm
    Route::get('/create',[DoMatController::class, 'create'])->name('doMat.create')->middleware('can:them-do-mat');
    // lưu trữ độ mật vừa thêm, phương thức thêm
    Route::post('/store',[DoMatController::class, 'store'])->name('doMat.store');
    // hiển thị độ mật, phương thức hiển thị
    Route::get('/show/{id}',[DoMatController::class, 'show'])->name('doMat.show'); 
    // chỉnh sửa độ mật, phương thức chỉnh sửa
    Route::get('/edit/{id}',[DoMatController::class, 'edit'])->name('doMat.edit')->middleware('can:sua-do-mat');    
    // lưu thông tin độ mật vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[DoMatController::class, 'update'])->name('doMat.update');
    // xóa độ mật, phương thức xóa
    Route::get('/delete/{id}',[DoMatController::class, 'destroy'])->name('doMat.delete')->middleware('can:xoa-do-mat');
});

// khi truy cập các mục liên quan đến hình thức thì dùng route này
Route::prefix('hinhThuc')->group(function(){    
    // danh sách hình thức, phương thức hiển thị
    Route::get('/',[HinhThucController::class, 'index'])->name('hinhThuc.index')->middleware('can:danh-sach-hinh-thuc');
    // thêm mới hình thức, phương thức thêm
    Route::get('/create',[HinhThucController::class, 'create'])->name('hinhThuc.create')->middleware('can:them-hinh-thuc');
    // lưu trữ hình thức vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucController::class, 'store'])->name('hinhThuc.store');
    // hiển thị hình thức, phương thức hiển thị
    Route::get('/show/{id}',[HinhThucController::class, 'show'])->name('hinhThuc.show'); 
    // chỉnh sửa hình thức, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucController::class, 'edit'])->name('hinhThuc.edit')->middleware('can:sua-hinh-thuc');    
    // lưu thông tin hình thức vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucController::class, 'update'])->name('hinhThuc.update');
    // xóa hình thức, phương thức xóa
    Route::get('/delete/{id}',[HinhThucController::class, 'destroy'])->name('hinhThuc.delete')->middleware('can:xoa-hinh-thuc');
});

// khi truy cập các mục liên quan đến hình thức chuyển thì dùng route này
Route::prefix('hinhThucChuyen')->group(function(){    
    // danh sách hình thức chuyển, phương thức hiển thị
    Route::get('/',[HinhThucChuyenController::class, 'index'])->name('hinhThucChuyen.index')->middleware('can:danh-sach-hinh-thuc-chuyen');
    // thêm mới hình thức chuyển, phương thức thêm
    Route::get('/create',[HinhThucChuyenController::class, 'create'])->name('hinhThucChuyen.create')->middleware('can:them-hinh-thuc-chuyen');
    // lưu trữ hình thức chuyển vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucChuyenController::class, 'store'])->name('hinhThucChuyen.store');
    // hiển thị hình thức chuyển, phương thức hiển thị
    Route::get('/show/{id}',[HinhThucChuyenController::class, 'show'])->name('hinhThucChuyen.show'); 
    // chỉnh sửa hình thức chuyển, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucChuyenController::class, 'edit'])->name('hinhThucChuyen.edit')->middleware('can:sua-hinh-thuc-chuyen');    
    // lưu thông tin hình thức chuyển vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucChuyenController::class, 'update'])->name('hinhThucChuyen.update');
    // xóa hình thức chuyển, phương thức xóa
    Route::get('/delete/{id}',[HinhThucChuyenController::class, 'destroy'])->name('hinhThucChuyen.delete')->middleware('can:dxoa-hinh-thuc-chuyen');
});

// khi truy cập các mục liên quan đến hình thức lưu thì dùng route này
Route::prefix('hinhThucLuu')->group(function(){    
    // danh sách hình thức lưu, phương thức hiển thị
    Route::get('/',[HinhThucLuuController::class, 'index'])->name('hinhThucLuu.index')->middleware('can:danh-sach-hinh-thuc-luu');
    // thêm mới hình thức lưu, phương thức thêm
    Route::get('/create',[HinhThucLuuController::class, 'create'])->name('hinhThucLuu.create')->middleware('can:them-hinh-thuc-luu');
    // lưu trữ hình thức lưu vừa thêm, phương thức thêm
    Route::post('/store',[HinhThucLuuController::class, 'store'])->name('hinhThucLuu.store');
    // hiển thị hình thức lưu, phương thức hiển thị
    Route::get('/show/{id}',[HinhThucLuuController::class, 'show'])->name('hinhThucLuu.show'); 
    // chỉnh sửa hình thức lưu, phương thức chỉnh sửa
    Route::get('/edit/{id}',[HinhThucLuuController::class, 'edit'])->name('hinhThucLuu.edit')->middleware('can:sua-hinh-thuc-luu');    
    // lưu thông tin hình thức lưu vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[HinhThucLuuController::class, 'update'])->name('hinhThucLuu.update');
    // xóa hình thức lưu, phương thức xóa
    Route::get('/delete/{id}',[HinhThucLuuController::class, 'destroy'])->name('hinhThucLuu.delete')->middleware('can:xoa-hinh-thuc-luu');
});

// khi truy cập các mục liên quan đến lĩnh vực thì dùng route này
Route::prefix('linhVuc')->group(function(){    
    // danh sách lĩnh vực, phương thức hiển thị
    Route::get('/',[LinhVucController::class, 'index'])->name('linhVuc.index')->middleware('can:danh-sach-linh-vuc');
    // thêm mới lĩnh vực, phương thức thêm
    Route::get('/create',[LinhVucController::class, 'create'])->name('linhVuc.create')->middleware('can:them-linh-vuc');
    // lưu trữ lĩnh vực vừa thêm, phương thức thêm
    Route::post('/store',[LinhVucController::class, 'store'])->name('linhVuc.store');
    // hiển thị lĩnh vực, phương thức hiển thị
    Route::get('/show/{id}',[LinhVucController::class, 'show'])->name('linhVuc.show'); 
    // chỉnh sửa lĩnh vực, phương thức chỉnh sửa
    Route::get('/edit/{id}',[LinhVucController::class, 'edit'])->name('linhVuc.edit')->middleware('can:sua-linh-vuc');    
    // lưu thông tin lĩnh vực vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[LinhVucController::class, 'update'])->name('linhVuc.update');
    // xóa lĩnh vực, phương thức xóa
    Route::get('/delete/{id}',[LinhVucController::class, 'destroy'])->name('linhVuc.delete')->middleware('can:xoa-linh-vuc');
});

// khi truy cập các mục liên quan đến tài khoản người dùng thì dùng route này
Route::prefix('nguoiDung')->group(function(){    
    // danh sách tài khoản người dùng, phương thức hiển thị
    Route::get('/',[NguoiDungController::class, 'index'])->name('nguoiDung.index')->middleware('can:danh-sach-tai-khoan');
    // thêm mới tài khoản người dùng, phương thức thêm
    Route::get('/create',[NguoiDungController::class, 'create'])->name('nguoiDung.create')->middleware('can:them-nguoi-dung');
    // lưu trữ tài khoản người dùng vừa thêm, phương thức thêm
    Route::post('/store',[NguoiDungController::class, 'store'])->name('nguoiDung.store');
    // hiển thị tài khoản người dùng, phương thức hiển thị
    Route::get('/show/{id}',[NguoiDungController::class, 'show'])->name('nguoiDung.show'); 
    // chỉnh sửa tài khoản người dùng, phương thức chỉnh sửa
    Route::get('/edit/{id}',[NguoiDungController::class, 'edit'])->name('nguoiDung.edit')->middleware('can:sua-nguoi-dung');    
    // lưu thông tin tài khoản người dùng vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[NguoiDungController::class, 'update'])->name('nguoiDung.update');
    // xóa tài khoản người dùng, phương thức xóa
    Route::get('/delete/{id}',[NguoiDungController::class, 'destroy'])->name('nguoiDung.delete')->middleware('can:xoa-nguoi-dung');
});

// khi truy cập các mục liên quan đến thể loại thì dùng route này
Route::prefix('theLoai')->group(function(){    
    // danh sách thể loại, phương thức hiển thị
    Route::get('/',[TheLoaiController::class, 'index'])->name('theLoai.index')->middleware('can:danh-sach-the-loai');
    // thêm mới thể loại, phương thức thêm
    Route::get('/create',[TheLoaiController::class, 'create'])->name('theLoai.create')->middleware('can:them-the-loai');
    // lưu trữ thể loại vừa thêm, phương thức thêm
    Route::post('/store',[TheLoaiController::class, 'store'])->name('theLoai.store');
    // hiển thị thể loại, phương thức hiển thị
    Route::get('/show/{id}',[TheLoaiController::class, 'show'])->name('theLoai.show'); 
    // chỉnh sửa thể loại, phương thức chỉnh sửa
    Route::get('/edit/{id}',[TheLoaiController::class, 'edit'])->name('theLoai.edit')->middleware('can:sua-the-loai');    
    // lưu thông tin thể loại vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[TheLoaiController::class, 'update'])->name('theLoai.update');
    // xóa thể loại, phương thức xóa
    Route::get('/delete/{id}',[TheLoaiController::class, 'destroy'])->name('theLoai.delete')->middleware('can:xoa-the-loai');
});

// khi truy cập các mục liên quan đến trạng thái thì dùng route này
Route::prefix('trangThai')->group(function(){    
    // danh sách trạng thái, phương thức hiển thị
    Route::get('/',[TrangThaiController::class, 'index'])->name('trangThai.index')->middleware('can:danh-sach-trang-thai');
    // thêm mới trạng thái, phương thức thêm
    Route::get('/create',[TrangThaiController::class, 'create'])->name('trangThai.create')->middleware('can:them-trang-thai');
    // lưu trữ trạng thái vừa thêm, phương thức thêm
    Route::post('/store',[TrangThaiController::class, 'store'])->name('trangThai.store');
    // hiển thị trạng thái, phương thức hiển thị
    Route::get('/show/{id}',[TrangThaiController::class, 'show'])->name('trangThai.show'); 
    // chỉnh sửa trạng thái, phương thức chỉnh sửa
    Route::get('/edit/{id}',[TrangThaiController::class, 'edit'])->name('trangThai.edit')->middleware('can:sua-trang-thai');    
    // lưu thông tin trạng thái vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[TrangThaiController::class, 'update'])->name('trangThai.update');
    // xóa trạng thái, phương thức xóa
    Route::get('/delete/{id}',[TrangThaiController::class, 'destroy'])->name('trangThai.delete')->middleware('can:xoa-trang-thai');
});

// khi truy cập các mục liên quan đến quyền truy cập thì dùng route này
Route::prefix('quyenTruyCap')->group(function(){    
    // danh sách quyền truy cập, phương thức hiển thị
    Route::get('/',[QuyenTruyCapController::class, 'index'])->name('quyenTruyCap.index')->middleware('can:danh-sach-quyen-truy-cap');
    // thêm mới quyền truy cập, phương thức thêm
    Route::get('/create',[QuyenTruyCapController::class, 'create'])->name('quyenTruyCap.create')->middleware('can:them-quyen-truy-cap');
    // lưu trữ quyền truy cập vừa thêm, phương thức thêm
    Route::post('/store',[QuyenTruyCapController::class, 'store'])->name('quyenTruyCap.store');
    // hiển thị quyền truy cập, phương thức hiển thị
    Route::get('/show/{id}',[QuyenTruyCapController::class, 'show'])->name('quyenTruyCap.show');  
    // chỉnh sửa quyền truy cập, phương thức chỉnh sửa
    Route::get('/edit/{id}',[QuyenTruyCapController::class, 'edit'])->name('quyenTruyCap.edit')->middleware('can:sua-quyen-truy-cap');    
    // lưu thông tin quyền truy cập vừa chỉnh sửa, phương thức cập nhật
    Route::put('/update/{id}',[QuyenTruyCapController::class, 'update'])->name('quyenTruyCap.update');
    // xóa quyền truy cập, phương thức xóa
    Route::get('/delete/{id}',[QuyenTruyCapController::class, 'destroy'])->name('quyenTruyCap.delete')->middleware('can:xoa-quyen-truy-cap');
});

// khi truy cập các mục liên quan đến văn bản đến thì dùng route này
Route::prefix('vanBanDen')->group(function(){    
    // danh sách văn bản đến, phương thức hiển thị
    Route::get('/',[VanBanDenController::class, 'index'])->name('vanBanDen.index')->middleware('can:danh-sach-van-ban-den');
    // thêm mới văn bản đến, phương thức thêm
    Route::get('/create',[VanBanDenController::class, 'create'])->name('vanBanDen.create')->middleware('can:them-van-ban-den');
    // lưu trữ văn bản đến vừa thêm, phương thức thêm
    Route::post('/store',[VanBanDenController::class, 'store'])->name('vanBanDen.store');
    // hiển thị văn bản đến, phương thức hiển thị
    Route::get('/show/{id}',[VanBanDenController::class, 'show'])->name('vanBanDen.show'); 
    // chỉnh sửa văn bản đến, phương thức chỉnh sửa
    Route::get('/edit/{id}',[VanBanDenController::class, 'edit'])->name('vanBanDen.edit')->middleware('can:sua-van-ban-den');    
    // lưu thông tin văn bản đến vừa chỉnh sửa, phương thức chỉnh sửa
    Route::put('/update/{id}',[VanBanDenController::class, 'update'])->name('vanBanDen.update');
    // xóa văn bản đến, phương thức xóa
    Route::get('/delete/{id}',[VanBanDenController::class, 'destroy'])->name('vanBanDen.delete')->middleware('can:xoa-van-ban-den');
});

// khi truy cập các mục liên quan đến văn bản đi thì dùng route này
Route::prefix('vanBanDi')->group(function(){    
    // danh sách văn bản đi, phương thức hiển thị
    Route::get('/',[VanBanDiController::class, 'index'])->name('vanBanDi.index')->middleware('can:danh-sach-van-ban-den');
    // thêm mới văn bản đi, phương thức thêm
    Route::get('/create',[VanBanDiController::class, 'create'])->name('vanBanDi.create')->middleware('can:them-van-ban-den');
    // lưu trữ văn bản đi vừa thêm, phương thức thêm
    Route::post('/store',[VanBanDiController::class, 'store'])->name('vanBanDi.store');
    // hiển thị văn bản đi, phương thức hiển thị
    Route::get('/show/{id}',[VanBanDiController::class, 'show'])->name('vanBanDi.show');  
    // chỉnh sửa văn bản đi, phương thức chỉnh sửa
    Route::get('/edit/{id}',[VanBanDiController::class, 'edit'])->name('vanBanDi.edit')->middleware('can:sua-van-ban-den');    
    // lưu thông tin văn bản đi vừa chỉnh sửa, phương thức cập nhật
    Route::put('/update/{id}',[VanBanDiController::class, 'update'])->name('vanBanDi.update');
    // xóa văn bản đi, phương thức xóa
    Route::get('/delete/{id}',[VanBanDiController::class, 'destroy'])->name('vanBanDi.delete')->middleware('can:xoa-van-ban-den');
});
