<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoMatController;

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
?>