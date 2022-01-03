<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use App\Models\VanBanDen;
use Illuminate\Http\Request;

use App\Traits\StorageFileTrait;
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
use Exception;
use Illuminate\Support\Facades\DB;

class VanBanDenController extends Controller
{
    use StorageFileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model vanBanDen để rút gọn code
        $data = VanBanDen::orderBy('created_at', 'ASC')->search()->paginate(5);

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
        // $request->validate([
        //     'trang_thai' => 'required',
        // ]);
        // tránh commit 1 dữ liệu 2 lần
        try{
            DB::beginTransaction();
            $data = [
                'so_vb_den'         => $request->so_vb_den, 
                'ki_hieu'           => $request->ki_hieu,
                'ngay_nhan'         => $request->ngay_nhan,
                'don_vi_ban_hanh'   => $request->don_vi_ban_hanh,
                'hinh_thuc'         => $request->hinh_thuc,
                'ngay_vb'           => $request->ngay_vb,
                'trich_yeu'         => $request->trich_yeu,
                'loai'              => $request->loai,
                'linh_vuc'          => $request->linh_vuc,
                'nguoi_ky'          => $request->nguoi_ky,
                'do_mat'            => $request->do_mat,
                'do_khan'           => $request->do_khan,
                'chuc_vu'           => $request->chuc_vu,
                'hinh_thuc_chuyen'  => $request->hinh_thuc_chuyen,
                'hinh_thuc_luu'     => $request->hinh_thuc_luu,
                'nv_nhan'           => auth()->id(),
                'han_xu_ly'         => $request->han_xu_ly,
            ];
    
            // liên kết với file stotageFileTrait để tối ưu lưu file vào hệ thống
            $fileUpload = $this->storageTraitUpload($request, 'ds_file', 'vanBanDi');
            
            if(!empty($fileUpload)){
                $data['ds_file'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
            $add = VanBanDen::create($data);
            DB::commit();
            if($add){
                return redirect()->route('vanBanDen.index')->with('success', 'Thêm mới thành công');
            }
        } catch (Exception $e) {
            DB::rollback();
        
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function show(VanBanDen $vanBanDen, $id)
    {
        $vanBanDen      = VanBanDen::find($id);
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
        return view('vanBanDen.show', compact(
            'vanBanDen', 
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function edit(VanBanDen $vanBanDen, $id)
    {
        $vanBanDen      = VanBanDen::find($id);
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
        return view('vanBanDen.edit', compact(
            'vanBanDen', 
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VanBanDen $vanBanDen, $id)
    {
        $vanBanDen->find($id)->update($request->only(
                'ki_hieu'           ,
                'ngay_nhan'         ,
                'don_vi_ban_hanh'  ,
                'hinh_thuc'         ,
                'ngay_vb'          ,
                'trich_yeu'         ,
                'loai'              ,
                'ds_file',
                'linh_vuc'          ,
                'nguoi_ky'          ,
                'do_mat'           ,
                'do_khan'           ,
                'chuc_vu'           ,
                'hinh_thuc_chuyen' ,
                'hinh_thuc_luu'     ,
                'han_xu_ly'     ,
            'updated_at'));
        
        return redirect()->route('vanBanDen.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VanBanDen  $vanBanDen
     * @return \Illuminate\Http\Response
     */
    public function destroy(VanBanDen $vanBanDen, $id)
    {
        $vanBanDen->find($id)->delete();
        return redirect()->route('vanBanDen.index')->with('success','Xóa văn bản đến thành công');
    }
}
