<?php

namespace App\Http\Controllers;

use App\Models\HasilUji;
use Illuminate\Http\Request;
use App\Models\DataUji;

class HasilUjiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=HasilUji::all();
        return view('datauji.hasiluji',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\HasilUji  $hasilUji
     * @return \Illuminate\Http\Response
     */
    public function show(HasilUji $hasilUji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilUji  $hasilUji
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilUji $hasilUji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilUji  $hasilUji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilUji $hasilUji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilUji  $hasilUji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= HasilUji::find($id);
        $data->delete();
        return redirect()->back();
    }
}
