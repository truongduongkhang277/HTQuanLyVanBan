<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinhVucController;

    // khi truy cập các mục liên quan đến lĩnh vực thì dùng route này
    Route::prefix('linhVuc')->group(function(){    
        // danh sách lĩnh vực, phương thức hiển thị
        Route::get('/',[LinhVucController::class, 'index'])->name('linhVuc.index')->middleware('can:danh-sach-linh-vuc');
        // thêm mới lĩnh vực, phương thức thêm
        Route::get('/create',[LinhVucController::class, 'create'])->name('linhVuc.create')->middleware('can:them-linh-vuc');
        // lưu trữ lĩnh vực vừa thêm, phương thức thêm
        Route::post('/store',[LinhVucController::class, 'store'])->name('linhVuc.store');
        // hiển thị lĩnh vực, phương thức hiển thị
        Route::get('/show/{id}',[LinhVucController::class, 'show'])->name('linhVuc.show'); 
        // chỉnh sửa lĩnh vực, phương thức chỉnh sửa
        Route::get('/edit/{id}',[LinhVucController::class, 'edit'])->name('linhVuc.edit')->middleware('can:sua-linh-vuc');    
        // lưu thông tin lĩnh vực vừa chỉnh sửa, phương thức chỉnh sửa
        Route::put('/update/{id}',[LinhVucController::class, 'update'])->name('linhVuc.update');
        // xóa lĩnh vực, phương thức xóa
        Route::get('/delete/{id}',[LinhVucController::class, 'destroy'])->name('linhVuc.delete')->middleware('can:xoa-linh-vuc');
    });
?>