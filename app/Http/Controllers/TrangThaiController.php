<?php

namespace App\Http\Controllers;

use App\Models\TrangThai;
use Illuminate\Http\Request;

class TrangThaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model TrangThai để rút gọn code
        $data = TrangThai::orderBy('created_at', 'ASC')->search()->paginate(7);

        return view('trangThai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trangThai.create');
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
            'trang_thai' => 'required'
        ]);

        //store
        $add = TrangThai::create($request->all());

        if($add){
            return redirect()->route('trangThai.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrangThai  $trangThai
     * @return \Illuminate\Http\Response
     */
    public function show(TrangThai $trangThai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrangThai  $trangThai
     * @return \Illuminate\Http\Response
     */
    public function edit(TrangThai $trangThai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrangThai  $trangThai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrangThai $trangThai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrangThai  $trangThai
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrangThai $trangThai)
    {
        //
    }
}
