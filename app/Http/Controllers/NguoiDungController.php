<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChucDanh;
use App\Models\BoPhan;
use App\Models\NguoiDung;
use App\Models\ChucNangNguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model user để rút gọn code
        $data = User::orderBy('name', 'ASC')->search()->paginate(15);

        return view('nguoiDung.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(NguoiDung $nguoiDung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiDung $nguoiDung)
    {
        // truyền biến nguoiDung đến giao diện edit của người dùng
        $chucDanh   = ChucDanh::orderBy('ten_quyen', 'ASC')->get();
        $boPhan     = BoPhan::orderBy('bo_phan', 'ASC')->get();

        return view('nguoiDung.edit', compact('nguoiDung', 'chucDanh', 'boPhan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $nguoiDung)
    {
        $nguoiDung->ngay_sinh = date('d/m/Y');
        
        $fileUpload = $this->storageTraitUpload($request, 'anh', 'nguoiDung');
        if(!empty($fileUpload)){
            $data['anh'] = $fileUpload['file_name'];
            $data['file_path'] = $fileUpload['file_path'];
        }
        $nguoiDung->update($request->only('name', 'ngay_sinh', 'so_dt', 'gioi_tinh', 'dia_chi', 'anh', 'trang_thai')); 
        
        if(is_array($request->chuc_danh)){
            foreach($request->chuc_danh as $chucdanh_id){
                ChucNangNguoiDung::create(['id_nguoidung' => $nguoiDung->id, 'id_chucdanh' => $chucdanh_id]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguoiDung $nguoiDung)
    {
        //
    }
}
