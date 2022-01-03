<?php

namespace App\Http\Controllers;

use App\Models\HinhThuc;
use Illuminate\Http\Request;

class HinhThucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model HinhThuc để rút gọn code
        $data = HinhThuc::orderBy('created_at', 'ASC')->search()->paginate(15);

        return view('hinhThuc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhThuc.add');
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
            'hinh_thuc' => 'required'
        ]);

        //store
        $add = HinhThuc::create($request->all());

        if($add){
            return redirect()->route('hinhThuc.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Http\Response
     */
    public function show(HinhThuc $hinhThuc, $id)
    {
        $hinhThuc = HinhThuc::find($id);
        return view('hinhThuc.show', compact('hinhThuc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Http\Response
     */
    public function edit(HinhThuc $hinhThuc, $id)
    {
        $hinhThuc = HinhThuc::find($id);
        return view('hinhThuc.edit', compact('hinhThuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HinhThuc $hinhThuc, $id)
    {
        $hinhThuc->find($id)->update($request->only('hinh_thuc', 'trang_thai', 'ghi_chu', 'updated_at'));
        return redirect()->route('hinhThuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhThuc $hinhThuc, $id)
    {
        $hinhThuc->find($id)->delete();
        return redirect()->route('hinhThuc.index')->with('success','Xóa hình thức thành công');
    }
}
