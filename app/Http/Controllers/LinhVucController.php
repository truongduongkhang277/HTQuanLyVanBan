<?php

namespace App\Http\Controllers;

use App\Models\LinhVuc;
use Illuminate\Http\Request;

class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model LinhVuc để rút gọn code
        $data = LinhVuc::orderBy('created_at', 'ASC')->search()->paginate(15);

        return view('linhVuc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linhVuc.add');
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
     * @param  \App\Models\Models\LinhVuc  $linhVuc
     * @return \Illuminate\Http\Response
     */
    public function show(LinhVuc $linhVuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\LinhVuc  $linhVuc
     * @return \Illuminate\Http\Response
     */
    public function edit(LinhVuc $linhVuc, $id)
    {
        $linhVuc = linhVuc::find($id);
        return view('linhVuc.edit', compact('linhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\LinhVuc  $linhVuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinhVuc $linhVuc, $id)
    {
        $linhVuc->find($id)->update($request->only('linh_vuc', 'trang_thai', 'ghi_chu', 'updated_at'));
        return redirect()->route('linhVuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\LinhVuc  $linhVuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinhVuc $linhVuc, $id)
    {
        $linhVuc->find($id)->delete();
        return redirect()->route('linhVuc.index')->with('success','Xóa lĩnh vực thành công');
    }
}
