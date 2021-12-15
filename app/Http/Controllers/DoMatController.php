<?php

namespace App\Http\Controllers;

use App\Models\DoMat;
use Illuminate\Http\Request;

class DoMatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model DoMat để rút gọn code
        $data = DoMat::orderBy('created_at', 'ASC')->search()->paginate(5);

        return view('doMat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doMat.create');
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
            'do_mat' => 'required'
        ]);

        //store
        $add = DoMat::create($request->all());

        if($add){
            return redirect()->route('doMat.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoMat  $doMat
     * @return \Illuminate\Http\Response
     */
    public function show(DoMat $doMat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoMat  $doMat
     * @return \Illuminate\Http\Response
     */
    public function edit(DoMat $doMat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoMat  $doMat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoMat $doMat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoMat  $doMat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoMat $doMat)
    {
        //
    }
}
