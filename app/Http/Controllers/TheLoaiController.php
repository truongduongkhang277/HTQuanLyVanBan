<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model TheLoai để rút gọn code
        $data = TheLoai::orderBy('created_at', 'ASC')->search()->paginate(10);

        return view('theLoai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theLoai.add');
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
            'ten_loai' => 'required'
        ], [
            'ten_loai.required' => 'Tên thể loại không được để trống !!',
        ]);

        //store
        $add = TheLoai::create($request->all());

        if($add){
            return redirect()->route('theLoai.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function show(TheLoai $theLoai, $id)
    {
        $theLoai = TheLoai::find($id);
        return view('theLoai.show', compact('theLoai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function edit(TheLoai $theLoai, $id)
    {
        $theLoai = theLoai::find($id);
        return view('theLoai.edit', compact('theLoai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TheLoai $theLoai, $id)
    {
        //validate
        $request->validate([
            'ten_loai' => 'required'
        ], [
            'ten_loai.required' => 'Tên thể loại không được để trống !!',
        ]);
        
        $update = $theLoai->find($id)->update($request->only('ten_loai', 'trang_thai', 'ghi_chu', 'updated_at'));
        if($update){
            return redirect()->route('theLoai.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function destroy(TheLoai $theLoai, $id)
    {
        $theLoai->find($id)->delete();
        return redirect()->route('theLoai.index')->with('success','Xóa thể loại thành công');
    }
}
