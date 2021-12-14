<?php

namespace App\Http\Controllers;

use App\Models\ChucDanh;
use Illuminate\Http\Request;

class ChucDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model ChucDanh để rút gọn code
        $data = ChucDanh::orderBy('created_at', 'ASC')->search()->paginate(10);

        return view('chucDanh.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chucDanh.create');
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
            'ten_quyen' => 'required'
        ]);

        //store
        $add = ChucDanh::create($request->all());

        if($add){
            return redirect()->route('admin.chucDanh.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function show(ChucDanh $chucDanh)
    {
        return view('chucDanh.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(ChucDanh $chucDanh)
    {
        return view('chucDanh.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChucDanh $chucDanh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChucDanh $chucDanh)
    {
        if($chucDanh == null ){
            //dd($coQuan);
            //$coQuan->delete();
            return redirect()->route('admin.chucDanh.index')->with('error','Không thể xóa chức danh này');
        } else {
            $chucDanh->delete();
            return redirect()->route('admin.chucDanh.index')->with('success','Xóa chức danh thành công');
        }
    }
}
