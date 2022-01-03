<?php

namespace App\Http\Controllers;

use App\Models\BoPhan;
use App\Models\NguoiDung;
use App\Models\User;
use Illuminate\Http\Request;

class BoPhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model BoPhan để rút gọn code
        $data = BoPhan::orderBy('created_at', 'ASC')->search()->paginate(5);

        return view('boPhan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nguoidung      = User::orderBy('email', 'ASC')->get();
        return view('boPhan.add', compact('nguoidung'));
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
            'bo_phan' => 'required',
            'ki_hieu' => 'required',
            'truong_bo_phan' => 'required',
        ]);

        //store
        $add = BoPhan::create($request->all());

        if($add){
            return redirect()->route('boPhan.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function show(BoPhan $boPhan, $id)
    {
        $boPhan = BoPhan::find($id);
        $nguoidung      = User::orderBy('email', 'ASC')->get();
        return view('boPhan.show', compact('boPhan','nguoidung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function edit(BoPhan $boPhan, $id)
    {
        $boPhan = BoPhan::find($id);

        // truyền biến nguoiDung đến giao diện edit của người dùng
        $nguoidung      = User::orderBy('email', 'ASC')->get();
        return view('boPhan.edit', compact('boPhan', 'nguoidung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoPhan $boPhan, $id)
    {
        $boPhan->find($id)->update($request->only('bo_phan', 'ki_hieu', 'truong_bo_phan', 'trang_thai', 'ghi_chu', 'updated_at'));
        return redirect()->route('boPhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoPhan $boPhan, $id)
    {
        $boPhan->find($id)->delete();
        return redirect()->route('boPhan.index')->with('success','Xóa bộ phận thành công');
    }
}
