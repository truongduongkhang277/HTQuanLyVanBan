<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinhVuc extends Model
{
    use HasFactory;
    protected $table = 'tbl_linhvuc';

    protected $fillable = ['linh_vuc', 'trang_thai' 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('linh_vuc', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
