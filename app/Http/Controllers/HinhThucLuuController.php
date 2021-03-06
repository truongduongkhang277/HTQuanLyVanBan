<?php

namespace App\Http\Controllers;

use App\Models\HinhThucLuu;
use Illuminate\Http\Request;

class HinhThucLuuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model HinhThucLuu để rút gọn code
        $data = HinhThucLuu::orderBy('created_at', 'ASC')->search()->paginate(15);

        return view('hinhThucLuu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhThucLuu.add');
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
            'hinh_thuc_luu' => 'required'
        ], [
            'hinh_thuc_luu.required' => 'Tên hình thức lưu không được để trống !!',
        ]);

        //store
        $add = HinhThucLuu::create($request->all());

        if($add){
            return redirect()->route('hinhThucLuu.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function show(HinhThucLuu $hinhThucLuu, $id)
    {
        $hinhThucLuu = HinhThucLuu::find($id);
        return view('hinhThucLuu.show', compact('hinhThucLuu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function edit(HinhThucLuu $hinhThucLuu, $id)
    {
        $hinhThucLuu = hinhThucLuu::find($id);
        return view('hinhThucLuu.edit', compact('hinhThucLuu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HinhThucLuu $hinhThucLuu, $id)
    {
        //validate
        $request->validate([
            'hinh_thuc_luu' => 'required'
        ], [
            'hinh_thuc_luu.required' => 'Tên hình thức lưu không được để trống !!',
        ]);
        
        $update = $hinhThucLuu->find($id)->update($request->only('hinh_thuc_luu', 'trang_thai', 'ghi_chu', 'updated_at'));
        if($update){
            return redirect()->route('hinhThucLuu.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhThucLuu $hinhThucLuu, $id)
    {
        $hinhThucLuu->find($id)->delete();
        return redirect()->route('hinhThucLuu.index')->with('success','Xóa hình thức lưu thành công');
    }
}
