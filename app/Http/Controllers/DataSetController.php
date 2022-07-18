<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSetModel;
use App\Models\DataAsliModel; 
use App\Models\DataTesting;
use App\Models\DataTraining;
use App\Models\Atribut;
use App\Models\Perhitungan;
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
        $data= DataSetModel::all();
        return view('dataset.dataset',compact('data'));
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
   
        $model= new DataSetModel;
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

   public function ujidataset(){
    Perhitungan::truncate();
    DataTraining::truncate();
    DataTesting::truncate();
    $totalData= DB::table('dataset')->count();
    $jumlahPindah= (round(($totalData/100)*70));
      $data= DataSetModel::all();
      $dataatribut=DB::table('atribut')->get()->toArray();
      
    for ($i=0; $i<$jumlahPindah; $i++) { 
       
        $model= new DataTraining;
        $model->nama= $data[$i]->nama;
        $model->pekerjaan=$data[$i]->pekerjaan;;
        $model->jumlahPengajuan=$data[$i]->jumlahPengajuan;
        $model->jenisPembayaran=$data[$i]->jenisPembayaran;
        $model->jangkaWaktu=$data[$i]->jangkaWaktu;
        $model->metodePembayaran=$data[$i]->metodePembayaran;
        $model->kapasitasBulanan=$data[$i]->kapasitasBulanan;
        $model->keterangan=$data[$i]->keterangan;
        $model->prediksi='coba lancar';
        $model->save();
    }
    for ($i=$jumlahPindah; $i<$totalData; $i++) { 
         
        
        $model= new DataTesting;
        $model->nama= $data[$i]->nama;
        $model->pekerjaan=$data[$i]->pekerjaan;
        $model->jumlahPengajuan=$data[$i]->jumlahPengajuan;
        $model->jenisPembayaran=$data[$i]->jenisPembayaran;
        $model->jangkaWaktu=$data[$i]->jangkaWaktu;
        $model->metodePembayaran=$data[$i]->metodePembayaran;
        $model->kapasitasBulanan=$data[$i]->kapasitasBulanan;
        $model->keterangan=$data[$i]->keterangan;
        $model->prediksi='coba lancar';
        $model->save();
    }
     foreach ($dataatribut as $key ) {
        $atribut=$key->atribut;
        $value=$key->value;
        $hitunglancar=DB::table('datatraining')->where('keterangan','=','Lancar')->get()->count();
        $hitungtidaklancar=DB::table('datatraining')->where('keterangan','=','Tidak Lancar')->get()->count();
        $nilaiatributmacet=DB::table('datatraining')->where($atribut,'=',$value)->where('keterangan','=','Tidak Lancar') ->get()->count();
        $nilaiatributlancar=DB::table('datatraining')->where($atribut,'=',$value)->where('keterangan','=','Lancar') ->get()->count();
        $probtdklancar=(round($nilaiatributmacet/$hitungtidaklancar,5)) ;
        $problancar=(round($nilaiatributlancar/$hitunglancar,5));
        
        $model= new Perhitungan;
        $model->atribut=$atribut;
        $model->nilai=$value;
        $model->totalLancar=$nilaiatributlancar;
        $model->totalMacet=$nilaiatributmacet;
        $model->probMacet=$probtdklancar;
        $model->probLancar=$problancar;
        $model->save();

     }
     $datatraining=DataTraining::all();
     foreach ($datatraining as $key ) {

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
    $nilaikapasitasBulananlancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    $kpsblnl=$nilaikapasitasBulananlancar['0']->probLancar;
    
    $lancar=(round($pekerjaanlancar*$jmlpengajuanlancar*$jnsPembayaranlancar*$jgkwaktulancar*$mtdpembayaranlancar*$kpsblnl,5)) ;
    
    //tidak lancar
    $nilaipekerjaantdklancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerkjaantdklancar=$nilaipekerjaantdklancar['0']->probMacet;
    $nilaijmlpengajuantdklancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray();
    $jmlpengajuantdklancar=$nilaijmlpengajuantdklancar['0']->probMacet;    
    $nilaijnspembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnspembayarantdklancar=$nilaijnspembayarantdklancar['0']->probMacet;
    $nilaijgkwaktutdklancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktutdklancar=$nilaijgkwaktutdklancar['0']->probMacet;
    $nilaimtdpembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayarantdklancar=$nilaimtdpembayarantdklancar['0']->probMacet;
    $nilaikapasitasBulanantdklancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    $kapasitasbulanantidaklancar=$nilaikapasitasBulanantdklancar['0']->probMacet;

    $tidaklancar=(round($pekerkjaantdklancar*$jmlpengajuantdklancar*$jnspembayarantdklancar*$jgkwaktutdklancar*$mtdpembayarantdklancar*$kapasitasbulanantidaklancar,5)) ;


     if ($lancar>=$tidaklancar) {
        $prediksi="Lancar";
    }else {
        $prediksi="Tidak Lancar";
    }
    
    $model=DataTraining::find($id);
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
    $nilaikapasitasBulananlancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    $kapasitasBulananlancar=$nilaikapasitasBulananlancar['0']->probLancar;
    
    $lancar=(round($pekerjaanlancar*$jmlpengajuanlancar*$jnsPembayaranlancar*$jgkwaktulancar*$mtdpembayaranlancar*$kapasitasBulananlancar,5)) ;
    
    //tidak lancar
    $nilaipekerjaantdklancar=DB::table('perhitungan')->where('nilai','=',$pekerjaan)->get()->toArray();
    $pekerkjaantdklancar=$nilaipekerjaantdklancar['0']->probMacet;
    $nilaijmlpengajuantdklancar=DB::table('perhitungan')->where('nilai','=',$jumlahPengajuan)->get()->toArray();
    $jmlpengajuantdklancar=$nilaijmlpengajuantdklancar['0']->probMacet;  
    $nilaijnspembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$jenisPembayaran)->get()->toArray();
    $jnspembayarantdklancar=$nilaijnspembayarantdklancar['0']->probMacet;
    $nilaijgkwaktutdklancar=DB::table('perhitungan')->where('nilai','=',$jangkaWaktu)->get()->toArray();
    $jgkwaktutdklancar=$nilaijgkwaktutdklancar['0']->probMacet;
    $nilaimtdpembayarantdklancar=DB::table('perhitungan')->where('nilai','=',$metodePembayaran)->get()->toArray();
    $mtdpembayarantdklancar=$nilaimtdpembayarantdklancar['0']->probMacet;
    $nilaikapasitasBulanantdklancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    $kapasitasbulanantidklancar=$nilaikapasitasBulanantdklancar['0']->probMacet;

    $tidaklancar=(round($pekerkjaantdklancar*$jmlpengajuantdklancar*$jnspembayarantdklancar*$jgkwaktutdklancar*$mtdpembayarantdklancar*$kapasitasbulanantidklancar,5)) ;


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
    
     }
    
   
    return redirect()->route('datatraining.index');

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