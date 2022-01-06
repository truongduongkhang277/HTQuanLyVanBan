<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangThaiController;

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
?>