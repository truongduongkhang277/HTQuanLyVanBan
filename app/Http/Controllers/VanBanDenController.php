<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use App\Models\VanBanDen;
use Illuminate\Http\Request;

use App\Models\HinhThuc;
use App\Models\TheLoai;
use App\Models\DoKhan;
use App\Models\DoMat;
use App\Models\TrangThai;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\HinhThucChuyen;
use App\Models\HinhThucLuu;
use App\Models\LinhVuc;

class VanBanDenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model vanBanDen để rút gọn code
        $data = VanBanDen::orderBy('created_at', 'ASC')->paginate(5);

        return view('vanBanDen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domat          = DoMat::orderBy('do_mat', 'ASC')->get();
        $dokhan         = DoKhan::orderBy('do_khan', 'ASC')->get();
        $linhvuc        = LinhVuc::orderBy('linh_vuc', 'ASC')->get();
        $hinhthuc       = HinhThuc::orderBy('hinh_thuc', 'ASC')->get();
        $hinhthucchuyen = HinhThucChuyen::orderBy('hinh_thuc_chuyen', 'ASC')->get();
        $hinhthucluu    = HinhThucLuu::orderBy('hinh_thuc_luu', 'ASC')->get();
        $theloai        = TheLoai::orderBy('ten_loai', 'ASC')->get();
        $trangthai      = TrangThai::orderBy('trang_thai', 'ASC')->get();
        $don_vi_ban_hanh= CoQuan::orderBy('ten_co_quan', 'ASC')->get();
        $nguoidung      = User::orderBy('email', 'ASC')->get();
        $chucdanh       = ChucDanh::orderBy('ten_quyen', 'ASC')->get();
        return view('vanBanDen.add', compact(
            'domat', 
            'dokhan', 
            'linhvuc',
            'hinhthuc', 
            'hinhthucchuyen',
            'hinhthucluu',
            'theloai', 
            'trangthai', 
            'don_vi_ban_hanh', 
            'nguoidung', 
            'chucdanh'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            //'trang_thai' => 'required'
        ]);

        // upload file
        if($request->has('upload')){
            $file_name = $request->upload->getClientOrginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $request->merge(['ds_file' => $file_name]);
        }

        //store
        $add = VanBanDen::create($request->all());

        if($add){
            return redirect()->route('vanBanDen.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function show(VanBanDen $vanBanDen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function edit(VanBanDen $vanBanDen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VanBanDen $vanBanDen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function destroy(VanBanDen $vanBanDen)
    {
        //
    }
}
