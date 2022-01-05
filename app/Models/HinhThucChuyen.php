<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinhThucChuyen extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_hinhthuc_chuyen';

    protected $fillable = ['hinh_thuc_chuyen', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('hinh_thuc_chuyen', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
