<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\DataTraining;
use Illuminate\Http\Request;
use DB;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Perhitungan::all();
        $perhitungan=DataTraining::all()->count();
        $tidaklayaktidaklancar=DB::table('datatraining')->where('prediksi','=','Tidak Lancar')->where('keterangan','=','Tidak Lancar')->count();
        $tidaklayaklancar=DB::table('datatraining')->where('prediksi','=','Lancar')->where('keterangan','=','Tidak Lancar')->count();
        $layaklancar=DB::table('datatraining')->where('prediksi','=','Lancar')->where('keterangan','=','Lancar')->count();
        $layaktidaklancar=DB::table('datatraining')->where('prediksi','=','Tidak Lancar')->where('keterangan','=','Lancar')->count();
        return view('pemodelan.pemodelan',compact('data','perhitungan','layaklancar','layaktidaklancar','tidaklayaktidaklancar','tidaklayaklancar'));
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
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
