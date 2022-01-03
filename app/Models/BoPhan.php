<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoPhan extends Model
{
    use HasFactory;
    protected $table = 'tbl_bophan';

    protected $fillable = ['bo_phan', 'ki_hieu', 'truong_bo_phan', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('bo_phan', 'like', '%'.$key.'%');
        }

        return $query;
    }

    public function truongBoPhan(){
        // 1 văn bản có 1 người dùng
        return $this->belongsTo('App\Models\User', 'truong_bo_phan');
    }
}
