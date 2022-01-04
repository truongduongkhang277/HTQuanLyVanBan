<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'tbl_vaitro';

    protected $fillable = ['vai_tro', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('vai_tro', 'like', '%'.$key.'%');
        }

        return $query;
    }

    public function cacQuyenTruyCap(){
        return $this->belongsToMany(QuyenTruyCap::class, 'tbl_vaitro_quyentruycap', 'id_vaitro', 'id_quyentruycap');
    }

}
