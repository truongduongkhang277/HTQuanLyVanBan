<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuyenTruyCapController;

    // khi truy cập các mục liên quan đến quyền truy cập thì dùng route này
    Route::prefix('quyenTruyCap')->group(function(){    
        // danh sách quyền truy cập, phương thức hiển thị
        Route::get('/',[QuyenTruyCapController::class, 'index'])->name('quyenTruyCap.index')->middleware('can:danh-sach-quyen-truy-cap');
        // thêm mới quyền truy cập, phương thức thêm
        Route::get('/create',[QuyenTruyCapController::class, 'create'])->name('quyenTruyCap.create')->middleware('can:them-quyen-truy-cap');
        // lưu trữ quyền truy cập vừa thêm, phương thức thêm
        Route::post('/store',[QuyenTruyCapController::class, 'store'])->name('quyenTruyCap.store');
        // hiển thị quyền truy cập, phương thức hiển thị
        Route::get('/show/{id}',[QuyenTruyCapController::class, 'show'])->name('quyenTruyCap.show');  
        // chỉnh sửa quyền truy cập, phương thức chỉnh sửa
        Route::get('/edit/{id}',[QuyenTruyCapController::class, 'edit'])->name('quyenTruyCap.edit')->middleware('can:sua-quyen-truy-cap');    
        // lưu thông tin quyền truy cập vừa chỉnh sửa, phương thức cập nhật
        Route::put('/update/{id}',[QuyenTruyCapController::class, 'update'])->name('quyenTruyCap.update');
        // xóa quyền truy cập, phương thức xóa
        Route::get('/delete/{id}',[QuyenTruyCapController::class, 'destroy'])->name('quyenTruyCap.delete')->middleware('can:xoa-quyen-truy-cap');
    });
?>