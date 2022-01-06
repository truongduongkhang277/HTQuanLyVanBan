<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoPhanController;

    // khi truy cập các mục liên quan đến bộ phận thì dùng route này
    Route::prefix('boPhan')->group(function(){    
        // danh sách bộ phận, phương thức hiển thị
        Route::get('/',[BoPhanController::class, 'index'])->name('boPhan.index')->middleware('can:danh-sach-bo-phan');
        // thêm mới bộ phận, phương thức thêm
        Route::get('/create',[BoPhanController::class, 'create'])->name('boPhan.create')->middleware('can:them-bo-phan');
        // lưu trữ bộ phận vừa thêm, phương thức thêm
        Route::post('/store',[BoPhanController::class, 'store'])->name('boPhan.store');
        // hiển thị bộ phận, phương thức hiển thị
        Route::get('/show/{id}',[BoPhanController::class, 'show'])->name('boPhan.show'); 
        // chỉnh sửa bộ phận, phương thức chỉnh sửa
        Route::get('/edit/{id}',[BoPhanController::class, 'edit'])->name('boPhan.edit')->middleware('can:sua-bo-phan');    
        // lưu thông tin bộ phận vừa chỉnh sửa, phương thức chỉnh sửa
        Route::put('/update/{id}',[BoPhanController::class, 'update'])->name('boPhan.update');
        // xóa bộ phận, phương thức xóa
        Route::get('/delete/{id}',[BoPhanController::class, 'destroy'])->name('boPhan.delete')->middleware('can:xoa-bo-phan');
    });
?>
