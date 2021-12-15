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
        $data = CoQuan::orderBy('created_at', 'ASC')->search()->paginate(7);

        return view('coQuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coQuan.create');
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
    public function show(CoQuan $coQuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function edit(CoQuan $coQuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoQuan $coQuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoQuan  $coQuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoQuan $coQuan)
    {

        if($coQuan == null ){
            //dd($coQuan);
            //$coQuan->delete();
            return redirect()->route('coQuan.index')->with('error','Không thể xóa cơ quan này');
        } else {
            $coQuan->delete();
            return redirect()->route('coQuan.index')->with('success','Xóa cơ quan thành công');
        }
    }
}
