<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\DataSetModel;
use app\Models\DataAsliModel;
use DB;

class DataSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DataAsliModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model= new DataAsliModel;
        $model->nama = $request->nama;
        $model->pekerjaan = $request->pekerjaan;
        $model->jumlahPengajuan = $request->jumlahPengajuan;
        $model->jenisPembayaran= $request->jenisPembayaran;
        $model->jangkaWaktu=$request->jangkaWaktu;
        $model->metodePembayaran=$request->metodePembayaran;
        $model->kapasitasBulanan=$request->kapasitasBulanan;
        $model->keterangan=$request->keterangan;
        $model->save();
        return redirect()->back();
    }

   

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
