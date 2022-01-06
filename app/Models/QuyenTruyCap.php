<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuyenTruyCap extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_quyentruycap';

    protected $fillable = ['quyen_truy_cap', 'parent_id', 'keycode', 'trang_thai'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('quyen_truy_cap', 'like', '%'.$key.'%');
        }

        return $query;
    }

    public function permissionChildren(){
        return $this->hasMany(QuyenTruyCap::class, 'parent_id');
    }

    public function recusive(){
        // 1 văn bản có 1 hình thức
        return $this->belongsTo('App\Models\QuyenTruyCap', 'parent_id');
    }
}
