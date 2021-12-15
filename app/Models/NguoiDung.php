<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;
    protected $table = 'tbl_nguoidung';

    protected $fillable = [
        'ten_dang_nhap', 
        'mat_khau', 
        'ho_ten', 
        'ngay_sinh', 
        'gioi_tinh', 
        'dia_chi', 
        'so_dt', 
        'email', 
        'anh', 
        'chuc_danh', 
        'bo_phan', 
        'trang_thai'
    ];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ho_ten', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
