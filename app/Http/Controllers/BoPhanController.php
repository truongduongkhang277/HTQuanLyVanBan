<?php

namespace App\Http\Controllers;

use App\Models\BoPhan;
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
        $data = BoPhan::orderBy('created_at', 'ASC')->search()->paginate(7);

        return view('boPhan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boPhan.create');
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
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function show(BoPhan $boPhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function edit(BoPhan $boPhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoPhan $boPhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoPhan  $boPhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoPhan $boPhan)
    {
        //
    }
}
