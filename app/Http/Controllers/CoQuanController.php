<?php

namespace App\Http\Controllers;

use App\Models\CoQuan;
use Illuminate\Http\Request;

class CoQuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model CoQuan để rút gọn code
        $data = CoQuan::orderBy('created_at', 'ASC')->search()->paginate(10);

        return view('coQuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coQuan.add');
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
            'ten_co_quan' => 'required',
            'dia_chi' => 'required',
        ], [
            'ten_co_quan.required' => 'Tên cơ quan không được để trống !!',
            'dia_chi.required' => 'Địa chỉ cơ quan không được để trống !!',
        ]);


        //store
        $add = CoQuan::create($request->all());

        if($add){
            return redirect()->route('coQuan.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function show(CoQuan $coQuan, $id)
    {
        $coQuan = CoQuan::find($id);
        return view('coQuan.show', compact('coQuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function edit(CoQuan $coQuan, $id)
    {
        $coQuan = CoQuan::find($id);
        return view('coQuan.edit', compact('coQuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoQuan $coQuan, $id)
    {
        //validate
        $request->validate([
            'ten_co_quan' => 'required',
            'dia_chi' => 'required',
        ], [
            'ten_co_quan.required' => 'Tên cơ quan không được để trống !!',
            'dia_chi.required' => 'Địa chỉ cơ quan không được để trống !!',
        ]);
        
        $update = $coQuan->find($id)->update($request->only('ten_co_quan', 'dia_chi', 'trang_thai', 'ghi_chu', 'updated_at'));
        if($update){
            return redirect()->route('coQuan.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoQuan $coQuan, $id)
    {
        $coQuan->find($id)->delete();
        return redirect()->route('coQuan.index')->with('success','Xóa cơ quan thành công');
    }
}
