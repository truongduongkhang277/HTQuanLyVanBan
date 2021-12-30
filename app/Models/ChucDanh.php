<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucDanh extends Model
{
    use HasFactory;

    protected $table = 'tbl_chucdanh';

    protected $fillable = ['ten_quyen', 'quyen_truy_cap', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten_quyen', 'like', '%'.$key.'%');
        }

        return $query;
    }

    public function nguoiDung(){
        // 1 chức danh có nhiều người dùng
        return $this->belongsToMany('App\Models\User');
    }

}
