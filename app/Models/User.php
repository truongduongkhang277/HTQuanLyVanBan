<?php

namespace App\Models;

use App\Models\ChucDanh;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ngay_sinh',
        'so_dt',
        'gioi_tinh',
        'dia_chi',
        'anh',
        'file_path',
        'bo_phan',
        'trang_thai',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //thêm local scope
    // phương thức tìm kiếm bằng tên người dùng

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }

        return $query;
    }

    // tbl: tên bảng sinh ra của 2 model
    // id_nguoidung : khóa ngoại của model user
    // id_vaitro: khóa ngoại của model vaitro
    public function cacVaiTro(){
        return $this->belongsToMany(VaiTro::class, 'tbl_nguoidung_vaitro', 'id_nguoidung', 'id_vaitro');
    }

    public function checkQuyenTruyCap($kiemTraQuyen){
        //b1 lấy được tất cả các quyền truy cập của user đang trong hệ thống
        $cacVaiTro = auth()->user()->cacVaiTro;
        foreach($cacVaiTro as $vaiTro){
            $cacQuyenTruyCap = $vaiTro->cacQuyenTruyCap;
            //b2 so sánh giá trị với dữ liệu có tồn tại hay không
            if($cacQuyenTruyCap->contains('keycode', $kiemTraQuyen)) {
                return true;
            }
        }
        return false;
    }

    public function boPhan(){
        return $this->belongsTo('App\Models\BoPhan', 'bo_phan');
    }

}
