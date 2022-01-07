<?php

namespace App\Http\Controllers;

use App\Models\BoPhan;
use App\Models\VanBanDi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\HinhThuc;
use App\Models\TheLoai;
use App\Models\DoKhan;
use App\Models\DoMat;
use App\Models\TrangThai;
use App\Models\User;
use App\Models\CoQuan;
use App\Models\HinhThucLuu;
use App\Models\LinhVuc;
use App\Models\VaiTro;
use App\Traits\StorageFileTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VanBanDiController extends Controller
{

    use StorageFileTrait;

    public function __construct(VanBanDi $vanBanDi){
        $this->$vanBanDi = $vanBanDi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // trỏ đến hàm scopeSearch trong model vanBanDi để rút gọn code
         $data = VanBanDi::orderBy('created_at', 'ASC')->search()->paginate(5);
         
         return view('vanBanDi.index', compact('data'));
    }

    public function handleGet(VanBanDi $vanBanDi, $id)
    {
        // trỏ đến hàm scopeSearch trong model vanBanDi để rút gọn code
        $boPhan = BoPhan::orderBy('bo_phan', 'ASC')->get();

        $nguoiDung = User::orderBy('bo_phan', 'ASC')->get();

        $vanBanDi = VanBanDi::find($id);
        return view('vanBanDi.handle', compact('boPhan', 'nguoiDung', 'vanBanDi'));
    }

    public function handlePost(Request $request, $id)
    {
        VanBanDi::find($id)->cacNguoiDung()->attach(auth()->user()->id, ['id_nguoidung_xuly'=>$request->nguoi_dung]);

        return redirect()->route('vanBanDi.index');
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
        $vaiTro = VaiTro::orderBy('vai_tro', 'ASC')->get();
        $nguoidung = User::orderBy('email', 'ASC')->get();
        return view('vanBanDi.add', compact(
            'domat', 
            'dokhan', 
            'hinhthuc', 
            'linhvuc', 
            'hinhthucluu', 
            'theloai', 
            'trangthai', 
            'coquan', 
            'vaiTro', 
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
            'so_vb_di' => 'required',
            'ki_hieu' => 'required',
            'ngay_gui' => 'required',
            'noi_nhan' => 'required',
            'trich_yeu' => 'required',
            'nguoi_ky' => 'required',            
            'ds_file' => 'required',
        ], [
            'so_vb_di.required'        => 'Số văn bản đi không được để trống !!',
            'ki_hieu.required'          => 'Kí hiệu không được để trống !!',
            'ngay_gui.required'        => 'Ngày nhận không được để trống !!',
            'noi_nhan.required'  => 'Đơn vị nhận văn bản không được để trống !!',
            'trich_yeu.required'        => 'Trích yếu không được để trống !!',
            'nguoi_ky.required'         => 'Tên trạng thái không được để trống !!',
            'ds_file.required'         => 'Cần có file đính kèm không được để trống !!',
        ]);
        // tránh commit 1 dữ liệu 2 lần
        try{
            DB::beginTransaction();
            $data = [
                'so_vb_di' => $request->so_vb_di, 
                'ki_hieu'=> $request->ki_hieu,
                'ngay_gui'=> $request->ngay_gui,
                'loai'=> $request->loai,
                'hinh_thuc'=> $request->hinh_thuc,
                'linh_vuc'=> $request->linh_vuc,
                'so_trang'=> $request->so_trang,
                'so_luong'=> $request->so_luong,
                'trich_yeu'=> $request->trich_yeu,
                'nguoi_ky'=> $request->nguoi_ky,
                'nv_phathanh' => auth()->id(),
                'chuc_vu'=> $request->chuc_vu,
                'noi_gui'=> $request->noi_gui,
                'do_khan'=> $request->do_khan,
                'hinh_thuc_luu'=> $request->hinh_thuc_luu,
                'noi_nhan'=> $request->noi_nhan,
                'han_xu_ly'=> $request->han_xu_ly,
            ];
    
            // liên kết với file stotageFileTrait để tối ưu lưu file vào hệ thống
            $fileUpload = $this->storageTraitUpload($request, 'ds_file', 'vanBanDi');
            
            if(!empty($fileUpload)){
                $data['ds_file'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
    
            $add = VanBanDi::create($data);
            DB::commit();
            if($add){
                return redirect()->route('vanBanDi.index')->with('success', 'Thêm mới thành công');
            }
    
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function show(VanBanDi $vanBanDi, $id)
    {
        $vanBanDi = VanBanDi::find($id);
        $domat = DoMat::orderBy('do_mat', 'ASC')->get();
        $dokhan = DoKhan::orderBy('do_khan', 'ASC')->get();
        $linhvuc = LinhVuc::orderBy('linh_vuc', 'ASC')->get();
        $hinhthuc = HinhThuc::orderBy('hinh_thuc', 'ASC')->get();
        $hinhthucluu = HinhThucLuu::orderBy('hinh_thuc_luu', 'ASC')->get();
        $theloai = TheLoai::orderBy('ten_loai', 'ASC')->get();
        $trangthai = TrangThai::orderBy('trang_thai', 'ASC')->get();
        $coquan = CoQuan::orderBy('ten_co_quan', 'ASC')->get();
        $vaiTro = VaiTro::orderBy('vai_tro', 'ASC')->get();
        $nguoidung = User::orderBy('email', 'ASC')->get();
        return view('vanBanDi.show', compact(
            'vanBanDi', 
            'domat', 
            'dokhan', 
            'hinhthuc', 
            'linhvuc', 
            'hinhthucluu', 
            'theloai', 
            'trangthai', 
            'coquan', 
            'vaiTro', 
            'nguoidung'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function edit(VanBanDi $vanBanDi, $id)
    {
        $vanBanDi = VanBanDi::find($id);
        $domat = DoMat::orderBy('do_mat', 'ASC')->get();
        $dokhan = DoKhan::orderBy('do_khan', 'ASC')->get();
        $linhvuc = LinhVuc::orderBy('linh_vuc', 'ASC')->get();
        $hinhthuc = HinhThuc::orderBy('hinh_thuc', 'ASC')->get();
        $hinhthucluu = HinhThucLuu::orderBy('hinh_thuc_luu', 'ASC')->get();
        $theloai = TheLoai::orderBy('ten_loai', 'ASC')->get();
        $trangthai = TrangThai::orderBy('trang_thai', 'ASC')->get();
        $coquan = CoQuan::orderBy('ten_co_quan', 'ASC')->get();
        $vaiTro = VaiTro::orderBy('vai_tro', 'ASC')->get();
        $nguoidung = User::orderBy('email', 'ASC')->get();
        return view('vanBanDi.edit', compact(
            'vanBanDi', 
            'domat', 
            'dokhan', 
            'hinhthuc', 
            'linhvuc', 
            'hinhthucluu', 
            'theloai', 
            'trangthai', 
            'coquan', 
            'vaiTro', 
            'nguoidung'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VanBanDi $vanBanDi, $id)
    {
        //validate
        $request->validate([
            'so_vb_di' => 'required',
            'ki_hieu' => 'required',
            'ngay_gui' => 'required',
            'noi_nhan' => 'required',
            'trich_yeu' => 'required',
            'nguoi_ky' => 'required',            
            'ds_file' => 'required',
        ], [
            'so_vb_di.required'        => 'Số văn bản đi không được để trống !!',
            'ki_hieu.required'          => 'Kí hiệu không được để trống !!',
            'ngay_gui.required'        => 'Ngày nhận không được để trống !!',
            'noi_nhan.required'  => 'Đơn vị nhận văn bản không được để trống !!',
            'trich_yeu.required'        => 'Trích yếu không được để trống !!',
            'nguoi_ky.required'         => 'Tên trạng thái không được để trống !!',
            'ds_file.required'         => 'Cần có file đính kèm không được để trống !!',
        ]);
        try{
            DB::beginTransaction();
            $data = [
                'so_vb_di' => $request->so_vb_di, 
                'ki_hieu'=> $request->ki_hieu,
                'ngay_gui'=> $request->ngay_gui,
                'loai'=> $request->loai,
                'hinh_thuc'=> $request->hinh_thuc,
                'linh_vuc'=> $request->linh_vuc,
                'so_trang'=> $request->so_trang,
                'so_luong'=> $request->so_luong,
                'trich_yeu'=> $request->trich_yeu,
                'nguoi_ky'=> $request->nguoi_ky,
                'nv_phathanh' => auth()->id(),
                'chuc_vu'=> $request->chuc_vu,
                'noi_gui'=> $request->noi_gui,
                'do_khan'=> $request->do_khan,
                'hinh_thuc_luu'=> $request->hinh_thuc_luu,
                'noi_nhan'=> $request->noi_nhan,
                'han_xu_ly'=> $request->han_xu_ly,
            ];
    
            // liên kết với file stotageFileTrait để tối ưu lưu file vào hệ thống
            $fileUpload = $this->storageTraitUpload($request, 'ds_file', 'vanBanDi');
            
            if(!empty($fileUpload)){
                $data['ds_file'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
    
            $add = VanBanDi::find($id)->update($data);
            DB::commit();
            if($add){
                return redirect()->route('vanBanDi.index')->with('success', 'Cập nhật thành công');
            }
    
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VanBanDi $vanBanDi, $id)
    {
        $vanBanDi->find($id)->delete();
        return redirect()->route('vanBanDi.index')->with('success','Xóa văn bản đi thành công');
    }
}
