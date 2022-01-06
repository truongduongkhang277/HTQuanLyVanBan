<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;

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
?>