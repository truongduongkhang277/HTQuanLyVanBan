<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

    /** VD:
     * GET => chucDanh.index => danh sách
     * GET => chucDanh.create => form thêm mới
     * POST => chucDanh.store => khi submit form thêm mới
     * GET => chucDanh.show => xem chi tiết
     * GET => chucDanh.edit => hiển thị form edit
     * PUT => chucDanh.update => khi submit form edit
     * DELETE => chucDanh.destroy => khi xóa
     */

    Route::resources([
        'bophan'            => 'BoPhanController',
        'chucDanh'          => 'ChucDanhController',
        'coQuan'            => 'CoQuanController',
        'doKhan'            => 'DoKhanController',
        'doMat'             => 'DoMatController',
        'hinhThuc'          => 'HinhThucController',
        'hinhThucChuyen'    => 'HinhThucChuyenController',
        'hinhThucLuu'       => 'HinhThucLuuController',
        'linhVuc'           => 'LinhVucController',
        'nguoiDung'         => 'NguoiDungController',
        'theLoai'           => 'TheLoaiController',
        'trangThai'         => 'TrangThaiController',
        'vanBanDen'         => 'VanBanDenController',
        'vanBanDi'          => 'VanBanDiController',
    ]);
});
