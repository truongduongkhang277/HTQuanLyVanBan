<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use App\Models\VanBanDi;
use Illuminate\Http\Request;

use App\Models\HinhThuc;
use App\Models\TheLoai;
use App\Models\DoKhan;
use App\Models\DoMat;
use App\Models\TrangThai;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\HinhThucLuu;
use App\Models\LinhVuc;

class VanBanDiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // trỏ đến hàm scopeSearch trong model vanBanDi để rút gọn code
         $data = VanBanDi::orderBy('created_at', 'ASC')->paginate(5);

         return view('vanBanDi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domat = DoMat::orderBy('do_mat', 'ASC')->get();
        $dokhan = DoKhan::orderBy('do_khan', 'ASC')->get();
        $linhvuc = LinhVuc::orderBy('linh_vuc', 'ASC')->get();
        $hinhthuc = HinhThuc::orderBy('hinh_thuc', 'ASC')->get();
        $hinhthucluu = HinhThucLuu::orderBy('hinh_thuc_luu', 'ASC')->get();
        $theloai = TheLoai::orderBy('ten_loai', 'ASC')->get();
        $trangthai = TrangThai::orderBy('trang_thai', 'ASC')->get();
        $coquan = CoQuan::orderBy('ten_co_quan', 'ASC')->get();
        $chucdanh = ChucDanh::orderBy('ten_quyen', 'ASC')->get();
        $nguoidung = User::orderBy('email', 'ASC')->get();
        return view('vanBanDi.create', compact(
            'domat', 
            'dokhan', 
            'hinhthuc', 
            'linhvuc', 
            'hinhthucluu', 
            'theloai', 
            'trangthai', 
            'coquan', 
            'chucdanh', 
            'nguoidung'
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
        $add = VanBanDi::create($request->all());

        if($add){
            return redirect()->route('vanBanDi.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function show(VanBanDi $vanBanDi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function edit(VanBanDi $vanBanDi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VanBanDi $vanBanDi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VanBanDi $vanBanDi)
    {
        //
    }
}
