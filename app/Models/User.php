<?php

namespace App\Models;

use App\Models\ChucDanh;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'bo_phan',
        'chuc_danh',
        'trang_thai'
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

    // lấy các quyền đã gán cho người dùng này
    public function quyenNguoiDung(){
        $data = [];
        foreach($this->getQuyen as $quyen){
            $ten_quyen = json_decode($quyen->quyen_truy_cap);
            foreach($ten_quyen as $quyenNguoiDung){
                if(!in_array($quyenNguoiDung, $data)){
                    array_push($data, $quyenNguoiDung);
                }
            }
            dd($quyen);
        }
        return $data;
    }

    // chức danh của tài khoản
    public function chucDanh(){
        return $this->belongsToMany('App\Models\ChucDanh');
    }
    // tài khoản có nhiều chức danh (nhiều quyền sử dụng)
    public function coCacChucDanh($cacChucDanh){
        if(is_array($cacChucDanh)){
            foreach($cacChucDanh as $chucDanh){
                if($this->coChucDanh($chucDanh)){
                    return true;
                }
            }
        } else {
            if($this->coChucDanh($cacChucDanh)){
                return true;
            }
        }
    }
    // lấy 1 chức danh (1 quyền) của người dùng
    public function coChucDanh($chucDanh){
        if($this->chucDanh()->where('ten_quyen', $chucDanh)->first()){
            return true;
        }
        return false;
    }


    //tương tự như trên nhưng code ngắn gọn
    public function getQuyen(){
        /*
            tbl_nguoidung_chucdanh: kết nối giữa bảng user và bảng tbl_chucdanh (bảng trung gian)
            id_nguoidung: khóa ngoại liên kết đến bảng User
            id_chucdanh: khóa ngoại đến bảng tbl_chucdanh
        */
        return $this->belongsToMany(ChucDanh::class, 'tbl_nguoidung_chucdanh', 'id_nguoidung', 'id_chucdanh');
    }
}
