<?php

namespace App\Http\Controllers;

use App\Models\QuyenTruyCap;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class QuyenTruyCapController extends Controller
{
    private $quyenTruyCap;

    public function __construct(QuyenTruyCap $quyenTruyCap)
    {
        $this->quyenTruyCap = $quyenTruyCap;
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = QuyenTruyCap::orderBy('id', 'ASC')->search()->paginate(5);
        return view('quyenTruyCap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // lấy dữ liệu có từ bảng Quyền truy cập
        $data = $this->quyenTruyCap->all();
        // khai báo biến 
        $recusive = new Recusive($data);
        // gán biến 
        $htmlOption = $recusive->permissionRecusive();

        return view('quyenTruyCap.add', compact('htmlOption'));
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
            'quyen_truy_cap' => 'required',
            'parent_id' => 'required',
        ], [
            'quyen_truy_cap.required' => 'Tên quyền truy cập không được để trống !!',
            'parent_id.required' => 'Tên thư mục cha không được để trống !!',
        ]);

        $add = QuyenTruyCap::create([
            'quyen_truy_cap' => $request->quyen_truy_cap,
            'parent_id' => $request->parent_id,
            'keycode' => Str::slug($request->quyen_truy_cap, '-'),
            'trang_thai' => $request->trang_thai
        ]);

        if($add){
            return redirect()->route('quyenTruyCap.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function show(QuyenTruyCap $quyenTruyCap, $id)
    {
        $quyenTruyCap = QuyenTruyCap::find($id);
        return view('quyenTruyCap.show', compact('quyenTruyCap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function edit(QuyenTruyCap $quyenTruyCap, $id)
    {
        // lấy dữ liệu có từ bảng Quyền truy cập
        $data = $this->quyenTruyCap->all();
        // khai báo biến 
        $recusive = new Recusive($data);
        // gán biến 
        $htmlOption = $recusive->permissionRecusive();

        $quyenTruyCap = QuyenTruyCap::find($id);
        return view('quyenTruyCap.edit', compact('quyenTruyCap', 'htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuyenTruyCap $quyenTruyCap, $id)
    {
        //validate
        $request->validate([
            'quyen_truy_cap' => 'required',
            'parent_id' => 'required',
        ], [
            'quyen_truy_cap.required' => 'Tên quyền truy cập không được để trống !!',
            'parent_id.required' => 'Tên thư mục cha không được để trống !!',
        ]);
        
        //$quyenTruyCap->find($id)->update($request->only('quyen_truy_cap','parent_id', 'keycode', 'trang_thai', 'updated_at'));
        $update = $quyenTruyCap->find($id)->update([
            'quyen_truy_cap' => $request->quyen_truy_cap,
            'parent_id' => $request->parent_id,
            'keycode' => Str::slug($request->quyen_truy_cap, '-'),
            'trang_thai' => $request->trang_thai,
            'updated_at'
        ]);
        if($update){
            return redirect()->route('quyenTruyCap.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuyenTruyCap $quyenTruyCap, $id)
    {
        $quyenTruyCap->find($id)->delete();
        return redirect()->route('quyenTruyCap.index')->with('success','Xóa quyền truy cập thành công');
    }
}
