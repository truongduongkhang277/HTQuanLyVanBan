<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoQuanController;

    // khi truy cập các mục liên quan đến cơ quan thì dùng route này
    Route::prefix('coQuan')->group(function(){    
        // danh sách cơ quan, phương thức hiển thị
        Route::get('/',[CoQuanController::class, 'index'])->name('coQuan.index')->middleware('can:danh-sach-co-quan');
        // thêm mới cơ quan, phương thức thêm
        Route::get('/create',[CoQuanController::class, 'create'])->name('coQuan.create')->middleware('can:them-co-quan');
        // lưu trữ cơ quan vừa thêm, phương thức thêm
        Route::post('/store',[CoQuanController::class, 'store'])->name('coQuan.store');
        // hiển thị cơ quan, phương thức hiển thị
        Route::get('/show/{id}',[CoQuanController::class, 'show'])->name('coQuan.show'); 
        // chỉnh sửa cơ quan, phương thức chỉnh sửa
        Route::get('/edit/{id}',[CoQuanController::class, 'edit'])->name('coQuan.edit')->middleware('can:sua-co-quan');    
        // lưu thông tin cơ quan vừa chỉnh sửa, phương thức chỉnh sửa
        Route::put('/update/{id}',[CoQuanController::class, 'update'])->name('coQuan.update');
        // xóa cơ quan, phương thức xóa
        Route::get('/delete/{id}',[CoQuanController::class, 'destroy'])->name('coQuan.delete')->middleware('can:xoa-co-quan');
    });
?>