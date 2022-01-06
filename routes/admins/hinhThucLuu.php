<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HinhThucLuuController;

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
?>