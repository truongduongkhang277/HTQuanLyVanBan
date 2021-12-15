<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhThucLuu extends Model
{
    use HasFactory;
    protected $table = 'tbl_hinhthuc_luu';

    protected $fillable = ['hinh_thuc_luu', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('hinh_thuc_luu', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
