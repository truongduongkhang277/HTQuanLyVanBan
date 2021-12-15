<?php

namespace App\Http\Controllers;

use App\Models\Models\HinhThucLuu;
use Illuminate\Http\Request;

class HinhThucLuuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model HinhThucLuu để rút gọn code
        $data = HinhThucLuu::orderBy('created_at', 'ASC')->search()->paginate(7);

        return view('hinhThucLuu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhThucLuu.create');
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
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function show(HinhThucLuu $hinhThucLuu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function edit(HinhThucLuu $hinhThucLuu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HinhThucLuu $hinhThucLuu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\HinhThucLuu  $hinhThucLuu
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhThucLuu $hinhThucLuu)
    {
        //
    }
}
