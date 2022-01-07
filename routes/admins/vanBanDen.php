<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VanBanDenController;

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

        // chuyển xử lý văn bản đến
        Route::get('/handleGet/{id}',[VanBanDenController::class, 'handleGet'])->name('vanBanDen.handleGet');
        // xử lý văn bản đến
        Route::put('/handlePost/{id}',[VanBanDenController::class, 'handlePost'])->name('vanBanDen.handlePost');
    });
?>