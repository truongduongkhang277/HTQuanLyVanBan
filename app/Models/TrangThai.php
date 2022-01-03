<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    use HasFactory;
    protected $table = 'tbl_trangthai';

    protected $fillable = ['ten_trang_thai', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten_trang_thai', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
