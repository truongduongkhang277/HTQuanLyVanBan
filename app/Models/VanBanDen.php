<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VanBanDen extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_vanban_den';

    protected $fillable = [
        'so_vb_den', 
        'ki_hieu', 
        'ngay_nhan', 
        'don_vi_ban_hanh', 
        'hinh_thuc', 
        'ngay_vb', 
        'trich_yeu', 
        'loai', 
        'linh_vuc', 
        'nguoi_ky', 
        'ds_file', 
        'file_path',
        'do_mat', 
        'do_khan', 
        'chuc_vu', 
        'hinh_thuc_chuyen', 
        'hinh_thuc_luu', 
        'nv_nhan', 
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

    public function hinhThuc(){
        // 1 văn bản có 1 hình thức
        return $this->belongsTo('App\Models\HinhThuc', 'hinh_thuc');
    }

    public function dvBanHanh(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\CoQuan', 'don_vi_ban_hanh');
    }

    public function loaiVB(){
        // 1 văn bản có 1 loại văn bản
        return $this->belongsTo('App\Models\TheLoai', 'loai');
    }

    public function linhVuc(){
        // 1 văn bản có 1 loại văn bản
        return $this->belongsTo('App\Models\LinhVuc', 'linh_vuc');
    }

    public function doMat(){
        // 1 văn bản có 1 loại văn bản
        return $this->belongsTo('App\Models\DoMat', 'do_mat');
    }

    public function doKhan(){
        // 1 văn bản có 1 loại văn bản
        return $this->belongsTo('App\Models\DoKhan', 'do_khan');
    }

    public function vaiTro(){
        // 1 văn bản có 1 đơn vị ban hành
        return $this->belongsTo('App\Models\VaiTro', 'chuc_vu');
    }

    public function hinhThucChuyen(){
        // 1 văn bản có 1 hình thức
        return $this->belongsTo('App\Models\HinhThucChuyen', 'hinh_thuc_chuyen');
    }

    public function hinhThucLuu(){
        // 1 văn bản có 1 hình thức
        return $this->belongsTo('App\Models\HinhThucLuu', 'hinh_thuc_luu');
    }

    public function nguoiNhan(){
        // 1 văn bản có 1 hình thức
        return $this->belongsTo('App\Models\User', 'nv_nhan');
    }
}
