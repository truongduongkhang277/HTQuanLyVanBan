<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanBanDen extends Model
{
    use HasFactory;
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
        'do_mat', 
        'do_khan', 
        'chuc_vu', 
        'hinh_thuc_chuyen', 
        'hinh_thuc_luu ', 
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

    //global scope
}
