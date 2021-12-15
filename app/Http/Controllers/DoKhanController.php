<?php

namespace App\Http\Controllers;

use App\Models\DoKhan;
use Illuminate\Http\Request;

class DoKhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model DoKhan để rút gọn code
        $data = DoKhan::orderBy('created_at', 'ASC')->search()->paginate(7);

        return view('doKhan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doKhan.create');
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
            'do_khan' => 'required'
        ]);

        //store
        $add = DoKhan::create($request->all());

        if($add){
            return redirect()->route('doKhan.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Thêm mới không thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoKhan  $doKhan
     * @return \Illuminate\Http\Response
     */
    public function show(DoKhan $doKhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoKhan  $doKhan
     * @return \Illuminate\Http\Response
     */
    public function edit(DoKhan $doKhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoKhan  $doKhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoKhan $doKhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoKhan  $doKhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoKhan $doKhan)
    {
        //
    }
}
