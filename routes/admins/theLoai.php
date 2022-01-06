<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheLoaiController;

    // khi truy cập các mục liên quan đến thể loại thì dùng route này
    Route::prefix('theLoai')->group(function(){    
        // danh sách thể loại, phương thức hiển thị
        Route::get('/',[TheLoaiController::class, 'index'])->name('theLoai.index')->middleware('can:danh-sach-the-loai');
        // thêm mới thể loại, phương thức thêm
        Route::get('/create',[TheLoaiController::class, 'create'])->name('theLoai.create')->middleware('can:them-the-loai');
        // lưu trữ thể loại vừa thêm, phương thức thêm
        Route::post('/store',[TheLoaiController::class, 'store'])->name('theLoai.store');
        // hiển thị thể loại, phương thức hiển thị
        Route::get('/show/{id}',[TheLoaiController::class, 'show'])->name('theLoai.show'); 
        // chỉnh sửa thể loại, phương thức chỉnh sửa
        Route::get('/edit/{id}',[TheLoaiController::class, 'edit'])->name('theLoai.edit')->middleware('can:sua-the-loai');    
        // lưu thông tin thể loại vừa chỉnh sửa, phương thức chỉnh sửa
        Route::put('/update/{id}',[TheLoaiController::class, 'update'])->name('theLoai.update');
        // xóa thể loại, phương thức xóa
        Route::get('/delete/{id}',[TheLoaiController::class, 'destroy'])->name('theLoai.delete')->middleware('can:xoa-the-loai');
    });
?>