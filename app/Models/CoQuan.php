<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoQuan extends Model
{
    use HasFactory;

    protected $table = 'tbl_coquan';

    protected $fillable = ['ten_co_quan', 'dia_chi', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten_co_quan', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
