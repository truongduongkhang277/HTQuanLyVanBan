<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VanBanDiController;

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
?>