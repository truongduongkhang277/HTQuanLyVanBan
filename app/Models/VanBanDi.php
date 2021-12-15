<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanBanDi extends Model
{
    use HasFactory;
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

    //global scope
}
