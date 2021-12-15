<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhThuc extends Model
{
    use HasFactory;
    protected $table = 'tbl_hinhthuc';

    protected $fillable = ['hinh_thuc', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('hinh_thuc', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
