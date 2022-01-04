<?php

namespace App\Http\Controllers;

use App\Models\QuyenTruyCap;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class QuyenTruyCapController extends Controller
{
    private $quyenTruyCap;

    public function __construct(QuyenTruyCap $quyenTruyCap)
    {
        $this->quyenTruyCap = $quyenTruyCap;
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = QuyenTruyCap::orderBy('id', 'ASC')->search()->paginate(5);
        return view('quyenTruyCap.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // lấy dữ liệu có từ bảng Quyền truy cập
        $data = $this->quyenTruyCap->all();
        // khai báo biến 
        $recusive = new Recusive($data);
        // gán biến 
        $htmlOption = $recusive->permissionRecusive();

        return view('quyenTruyCap.add', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuyenTruyCap::create([
            'quyen_truy_cap' => $request->quyen_truy_cap,
            'parent_id' => $request->parent_id,
            'keycode' => Str::slug($request->quyen_truy_cap, '-'),
            'trang_thai' => $request->trang_thai
        ]);
        return redirect()->route('quyenTruyCap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function show(QuyenTruyCap $quyenTruyCap, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function edit(QuyenTruyCap $quyenTruyCap, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuyenTruyCap $quyenTruyCap, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuyenTruyCap $quyenTruyCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuyenTruyCap $quyenTruyCap, $id)
    {
        
    }
}
