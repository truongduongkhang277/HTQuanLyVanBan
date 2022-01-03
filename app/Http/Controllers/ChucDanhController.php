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
        $routes = '';     
        return view('chucDanh.add', compact('routes'));
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
        ],['ten_quyen.required' => 'Tên quyền không được để trống !!']);

        // gán các quyền được chọn thành chuỗi json
        $routes = json_encode($request->quyen_truy_cap);

        //store
        $add = ChucDanh::create(['ten_quyen' => $request->ten_quyen, 'quyen_truy_cap' => $routes]);

        //ChucDanh::create($request->all());

        if($add){
            return redirect()->route('chucDanh.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function show(ChucDanh $chucDanh, $id)
    {
        $chucDanh = ChucDanh::find($id);
        return view('chucDanh.show', compact('chucDanh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(ChucDanh $chucDanh, $id)
    {
        $chucDanh = ChucDanh::find($id);
        return view('chucDanh.edit', compact('chucDanh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChucDanh $chucDanh, $id)
    {
        $chucDanh->find($id)->update($request->only('ten_quyen', 'trang_thai', 'ghi_chu', 'updated_at'));
        return redirect()->route('chucDanh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucDanh  $chucDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChucDanh $chucDanh, $id)
    {
        $chucDanh->find($id)->delete();
        return redirect()->route('chucDanh.index')->with('success','Xóa chức danh thành công');
    }
}
