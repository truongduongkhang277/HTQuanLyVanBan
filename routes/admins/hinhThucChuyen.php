<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HinhThucChuyenController;

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
?>