<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucNangNguoiDung extends Model
{
    use HasFactory;

    protected $table = 'tbl_nguoidung_chucdanh';

    protected $fillable = ['id_nguoidung', 'id_chucdanh'];
}
