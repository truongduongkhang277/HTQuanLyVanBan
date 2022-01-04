<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenTruyCap extends Model
{
    use HasFactory;
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
}
