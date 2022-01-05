<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiDung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;

    protected $table = 'users';

    // protected $fillable = [
    //     'ten_dang_nhap', 
    //     'mat_khau', 
    //     'ho_ten', 
    //     'ngay_sinh', 
    //     'gioi_tinh', 
    //     'dia_chi', 
    //     'so_dt', 
    //     'email', 
    //     'anh', 
    //     'chuc_danh', 
    //     'bo_phan', 
    //     'trang_thai'
    // ];

    //thêm local scope

    // public function scopeSearch($query)
    // {
    //     if($key = request()->key){
    //         $query = $query->where('name', 'like', '%'.$key.'%');
    //     }

    //     return $query;
    // }

    //global scope
}
