<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoKhanController;

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
?>