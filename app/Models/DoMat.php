<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoMat extends Model
{
    use HasFactory;
    protected $table = 'tbl_domat';

    protected $fillable = ['do_mat', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('do_mat', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
