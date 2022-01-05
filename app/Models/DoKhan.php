<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoKhan extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $table = 'tbl_dokhan';

    protected $fillable = ['do_khan', 'trang_thai', 'ghi_chu'];

    //thêm local scope

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('do_khan', 'like', '%'.$key.'%');
        }

        return $query;
    }

    //global scope
}
