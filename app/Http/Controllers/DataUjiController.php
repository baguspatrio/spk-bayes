<?php

namespace App\Http\Controllers;

use App\Models\DataUji;
use Illuminate\Http\Request;
use App\Models\Perhitungan;
use DB;

class DataUjiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DataUji::all();
        return view('datauji.datauji',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=DataUji::all();
        return view('datauji.datauji',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama=$request->nama;
        $pekerjaan=$request->pekerjaan;
        $jumlahPengajuan=$request->jumlahPengajuan;
        $jnsPembayaran=$request->jenisPembayaran;
        $jangkaWaktu=$request->jangkaWaktu;
        $metodePembayaran=$request->metodePembayaran;
        $kapasitasBulanan=$request->kapasitasBulanan;

        $model= new Datauji;
        $model->nama=$nama;
        $model->pekerjaan=$pekerjaan;
        $model->jumlahPengajuan=$jumlahPengajuan;
        $model->jenisPembayaran=$jnsPembayaran;
        $model->jangkaWaktu=$jangkaWaktu;
        $model->metodePembayaran=$metodePembayaran;
        $model->kapasitasBulanan=$kapasitasBulanan;
        $model->save();
    }

    public function ujidatapengajuan(){
    Perhitungan::truncate();
    $totalData= DB::table('dataset')->count();
    $jumlahPindah= (round(($totalData/100)*70));
      $data= DataSetModel::all();
      $dataatribut=DB::table('atribut')->get()->toArray();
     $datauji=DataUji::all();
     foreach ($datauji as $key ) {

    $id=$key->id;
    $nama=$key->nama;
    $pekerjaan=$key->pekerjaan;
    $jumlahPengajuan=$key->jumlahPengajuan;
    $jenisPembayaran=$key->jenisPembayaran;
    $jangkaWaktu=$key->jangkaWaktu;
    $metodePembayaran=$key->metodePembayaran;
    $kapasitasBulanan=$key->kapasitasBulanan;
    $keterangan=$key->keterangan;
    
    //lancar
    $nilaipekerjaanlancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerjaanlancar=$nilaipekerjaanlancar['0']->probLancar;
    $nilaijmlpengajuanlancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray(); 
    $jmlpengajuanlancar=$nilaijmlpengajuanlancar['0']->probLancar;  
    $nilaijnspembayaranlancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnsPembayaranlancar=$nilaijnspembayaranlancar['0']->probLancar;
    $nilaijgkwaktulancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktulancar=$nilaijgkwaktulancar['0']->probLancar;
    $nilaimtdpembayaranlancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayaranlancar=$nilaimtdpembayaranlancar['0']->probLancar;
    // $nilaikapasitasBulananlancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    // $kpsblnl=$nilaikapasitasBulananlancar['0']->probLancar;
    
    $lancar=(round($pekerjaanlancar*$jmlpengajuanlancar*$jnsPembayaranlancar*$jgkwaktulancar*$mtdpembayaranlancar,5)) ;
    
    //tidak lancar
    $nilaipekerjaantdklancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerkjaantdklancar=$nilaipekerjaantdklancar['0']->probLancar;
    $nilaijmlpengajuantdklancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray();
    $jmlpengajuantdklancar=$nilaijmlpengajuantdklancar['0']->probLancar;    
    $nilaijnspembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnspembayarantdklancar=$nilaijnspembayarantdklancar['0']->probLancar;
    $nilaijgkwaktutdklancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktutdklancar=$nilaijgkwaktutdklancar['0']->probLancar;
    $nilaimtdpembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayarantdklancar=$nilaimtdpembayarantdklancar['0']->probLancar;
    // $nilaikapasitasBulanantdklancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    // $kapasitasbulanantidklancar=$nilaikapasitasBulanantdklancar['0']->probLancar;

    $tidaklancar=(round($pekerkjaantdklancar*$jmlpengajuantdklancar*$jnspembayarantdklancar*$jgkwaktutdklancar*$mtdpembayarantdklancar,5)) ;


     if ($lancar>$tidaklancar) {
        $prediksi="Lancar";
    }else {
        $prediksi="Tidak Lancar";
    }
    
    
    $model=datauji::find($id);
    $model->nama = $nama;
    $model->pekerjaan = $pekerjaan;
    $model->jumlahPengajuan = $jumlahPengajuan;
    $model->jenisPembayaran= $jenisPembayaran;
    $model->jangkaWaktu=$jangkaWaktu;
    $model->metodePembayaran=$metodePembayaran;
    $model->kapasitasBulanan=$kapasitasBulanan;
    $model->keterangan=$keterangan;
    $model->prediksi= $prediksi;
    $model->save();
    echo "<b>$tidaklancar<b><br>$lancar<br> ";
     }
     $datatesting=DataTesting::all();
     foreach ($datatesting as $key ) {

    $id=$key->id;
    $nama=$key->nama;
    $pekerjaan=$key->pekerjaan;
    $jumlahPengajuan=$key->jumlahPengajuan;
    $jenisPembayaran=$key->jenisPembayaran;
    $jangkaWaktu=$key->jangkaWaktu;
    $metodePembayaran=$key->metodePembayaran;
    $kapasitasBulanan=$key->kapasitasBulanan;
    $keterangan=$key->keterangan;
    
    //lancar
    $nilaipekerjaanlancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerjaanlancar=$nilaipekerjaanlancar['0']->probLancar;
    $nilaijmlpengajuanlancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray(); 
    $jmlpengajuanlancar=$nilaijmlpengajuanlancar['0']->probLancar;  
    $nilaijnspembayaranlancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnsPembayaranlancar=$nilaijnspembayaranlancar['0']->probLancar;
    $nilaijgkwaktulancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktulancar=$nilaijgkwaktulancar['0']->probLancar;
    $nilaimtdpembayaranlancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayaranlancar=$nilaimtdpembayaranlancar['0']->probLancar;
    // $nilaikapasitasBulananlancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    // $kpsblnl=$nilaikapasitasBulananlancar['0']->probLancar;
    
    $lancar=(round($pekerjaanlancar*$jmlpengajuanlancar*$jnsPembayaranlancar*$jgkwaktulancar*$mtdpembayaranlancar,5)) ;
    
    //tidak lancar
    $nilaipekerjaantdklancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerkjaantdklancar=$nilaipekerjaantdklancar['0']->probLancar;
    $nilaijmlpengajuantdklancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray();
    $jmlpengajuantdklancar=$nilaijmlpengajuantdklancar['0']->probLancar;    
    $nilaijnspembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnspembayarantdklancar=$nilaijnspembayarantdklancar['0']->probLancar;
    $nilaijgkwaktutdklancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktutdklancar=$nilaijgkwaktutdklancar['0']->probLancar;
    $nilaimtdpembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayarantdklancar=$nilaimtdpembayarantdklancar['0']->probLancar;
    // $nilaikapasitasBulanantdklancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    // $kapasitasbulanantidklancar=$nilaikapasitasBulanantdklancar['0']->probLancar;

    $tidaklancar=(round($pekerkjaantdklancar*$jmlpengajuantdklancar*$jnspembayarantdklancar*$jgkwaktutdklancar*$mtdpembayarantdklancar,5)) ;


     if ($lancar>$tidaklancar) {
        $prediksi="Lancar";
    }else {
        $prediksi="Tidak Lancar";
    }
    
    
    $model=DataTesting::find($id);
    $model->nama = $nama;
    $model->pekerjaan = $pekerjaan;
    $model->jumlahPengajuan = $jumlahPengajuan;
    $model->jenisPembayaran= $jenisPembayaran;
    $model->jangkaWaktu=$jangkaWaktu;
    $model->metodePembayaran=$metodePembayaran;
    $model->kapasitasBulanan=$kapasitasBulanan;
    $model->keterangan=$keterangan;
    $model->prediksi= $prediksi;
    $model->save();
    echo "$prediksi<br>$lancar<br> ";
     }
     
   
    
   

   
   
  

   }


    public function show(DataUji $dataUji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataUji  $dataUji
     * @return \Illuminate\Http\Response
     */
    public function edit(DataUji $dataUji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataUji  $dataUji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataUji $dataUji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataUji  $dataUji
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataUji $dataUji)
    {
        //
    }
}
