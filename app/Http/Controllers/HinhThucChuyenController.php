<?php

namespace App\Http\Controllers;

use App\Models\Models\HinhThucChuyen;
use Illuminate\Http\Request;

class HinhThucChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model HinhThucChuyen để rút gọn code
        $data = HinhThucChuyen::orderBy('created_at', 'ASC')->search()->paginate(5);

        return view('hinhThucChuyen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hinhThucChuyen.create');
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
     * @param  \App\Models\Models\HinhThucChuyen  $hinhThucChuyen
     * @return \Illuminate\Http\Response
     */
    public function show(HinhThucChuyen $hinhThucChuyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\HinhThucChuyen  $hinhThucChuyen
     * @return \Illuminate\Http\Response
     */
    public function edit(HinhThucChuyen $hinhThucChuyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\HinhThucChuyen  $hinhThucChuyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HinhThucChuyen $hinhThucChuyen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\HinhThucChuyen  $hinhThucChuyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhThucChuyen $hinhThucChuyen)
    {
        //
    }
}
