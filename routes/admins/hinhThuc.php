<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HinhThucController;

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
?>