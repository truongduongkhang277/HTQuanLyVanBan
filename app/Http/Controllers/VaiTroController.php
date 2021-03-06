<?php

namespace App\Http\Controllers;

use App\Models\QuyenTruyCap;
use App\Models\VaiTro;
use Illuminate\Http\Request;

class VaiTroController extends Controller
{
    private $vaiTro;
    private $quyenTruyCap;

    public function __construct(VaiTro $vaiTro, QuyenTruyCap $quyenTruyCap)
    {
        $this->vaiTro = $vaiTro;
        $this->quyenTruyCap = $quyenTruyCap;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // trỏ đến hàm scopeSearch trong model VaiTro để rút gọn code
         $data = VaiTro::orderBy('created_at', 'ASC')->search()->paginate(10);
         return view('vaiTro.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // lấy dữ liệu quyền truy cập hệ thống
        $quyenTruyCapParent = $this->quyenTruyCap->where('parent_id', 0)->get();     
        return view('vaiTro.add', compact('quyenTruyCapParent'));
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
            'vai_tro' => 'required'
        ],['vai_tro.required' => 'Tên vai trò không được để trống !!']);

        //store
        $vaiTro = VaiTro::create([
            'vai_tro' => $request->vai_tro,
            'trang_thai' => $request->trang_thai,
            'ghi_chu' => $request->ghi_chu
        ]);

        $vaiTro->cacQuyenTruyCap()->attach($request->quyenTruyCap_id);

        if($vaiTro){
            return redirect()->route('vaiTro.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function show(VaiTro $vaiTro, $id)
    {
        $vaiTro = VaiTro::find($id);
        return view('vaiTro.show', compact('vaiTro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function edit(VaiTro $vaiTro, $id)
    {
        $quyenTruyCapParent = $this->quyenTruyCap->where('parent_id', 0)->get();
        $vaiTro = VaiTro::find($id); 
        $quyenTruyCapChecked = $vaiTro->cacQuyenTruyCap;   
        return view('vaiTro.edit', compact('quyenTruyCapParent', 'vaiTro', 'quyenTruyCapChecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaiTro $vaiTro, $id)
    {
        //validate
        $request->validate([
            'vai_tro' => 'required'
        ],['vai_tro.required' => 'Tên vai trò không được để trống !!']);

        
        $vaiTro = VaiTro::find($id);
        //store
        
        $vaiTro->cacQuyenTruyCap()->sync($request->quyenTruyCap_id);

        $update = $vaiTro->update([
            'vai_tro' => $request->vai_tro,
            'trang_thai' => $request->trang_thai,
            'ghi_chu' => $request->ghi_chu
        ]);
        if($update){
            return redirect()->route('vaiTro.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaiTro  $vaiTro
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaiTro $vaiTro, $id)
    {
        $vaiTro->find($id)->delete();
        return redirect()->route('vaiTro.index')->with('success','Xóa chức danh thành công');
    }
}
