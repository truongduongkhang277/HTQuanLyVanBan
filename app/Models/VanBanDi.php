<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VanBanDi extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_vanban_di';

    protected $fillable = 
    [
        'so_vb_di', 
        'ki_hieu', 
        'ngay_gui',
        'loai',   
        'hinh_thuc', 
        'linh_vuc', 
        'so_trang',
        'so_luong', 
        'trich_yeu', 
        'nguoi_ky',
        'nv_phathanh',  
        'ds_file',
        'file_path', 
        'chuc_vu',
        'noi_gui', 
        'do_khan',  
        'hinh_thuc_luu', 
        'noi_nhan', 
        'han_xu_ly', 
        'trang_thai'
    ];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('trich_yeu', 'like', '%'.$key.'%');
        }

        return $query;
    }

    public function nguoiKy(){
        // 1 văn bản có 1 người dùng
        return $this->belongsTo('App\Models\User', 'nguoi_ky');
    }

    public function nvPhatHanh(){
        // 1 văn bản có 1 nhân viên phát hành
        return $this->belongsTo('App\Models\User', 'nv_phathanh');
    }

    public function noiNhan(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\CoQuan', 'noi_nhan');
    }

    public function loaiVB(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\TheLoai', 'loai');
    }

    public function hinhThuc(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\HinhThuc', 'hinh_thuc');
    }

    public function linhVuc(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\LinhVuc', 'linh_vuc');
    }

    public function vaiTro(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\VaiTro', 'chuc_vu');
    }

    public function noiGui(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\CoQuan', 'noi_gui');
    }

    public function hinhThucLuu(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\HinhThucLuu', 'hinh_thuc_luu');
    }

    public function doKhan(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\DoKhan', 'do_khan');
    }

    // tbl: tên bảng sinh ra của 2 model
    // id_vanbanden : khóa ngoại của model vanbanden
    // id_nguoidung: khóa ngoại của model user
    public function cacNguoiDung(){
        return $this->belongsToMany(User::class, 'tbl_vbdi_nguoidung', 'id_vanbandi', 'id_nguoidung')->withPivot('id_nguoidung_xuly');
    }
}
