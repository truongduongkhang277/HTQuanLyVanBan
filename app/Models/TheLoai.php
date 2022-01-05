<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoai extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_theloai';

    protected $fillable = ['ten_loai', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten_loai', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
