<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VaiTroController;

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
?>