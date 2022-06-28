<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSetModel;
use App\Models\DataAsliModel; 
use App\Models\DataTesting;
use App\Models\DataTraining;
use App\Models\Atribut;
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
    //      $validator = Validator::make($request->all(), [
    //     'nama' => 'required',
    //     'pekerjaan' => 'required',
    //     'jumlahPengajuan'=>'required',
    //     'jenisPembayaran'=>'required',
    //     'jangkaWaktu'=>'required',
    //     'metodePembayaran'=>'required',
    //     'kapasitasBulanan'=>'required',
    //     'keterangan'=>'required'
    //     ]);
        
    // if ($validator->fails()) {
    //     return redirect('dataset/dataset')
    //         ->withErrors($validator)
    //         ->withInput();
    // }
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

    $totalData= DB::table('dataset')->count();
    $jumlahPindah= (round(($totalData/100)*70));
      $data= DataSetModel::all();
  
   
    // for ($i=0; $i<$jumlahPindah; $i++) { 
       
    //     $model= new DataTraining;
    //     $model->nama= $data[$i]->nama;;
    //     $model->pekerjaan=$data[$i]->pekerjaan;;
    //     $model->jumlahPengajuan=$data[$i]->jumlahPengajuan;;
    //     $model->jenisPembayaran=$data[$i]->jenisPembayaran;
    //     $model->jangkaWaktu=$data[$i]->jangkaWaktu;
    //     $model->metodePembayaran=$data[$i]->metodePembayaran;
    //     $model->kapasitasBulanan=$data[$i]->kapasitasBulanan;
    //     $model->keterangan=$data[$i]->keterangan;
    //     $model->prediksi='coba lancar';
    //     $model->save();
    // }
    // for ($i=$jumlahPindah; $i<$totalData; $i++) { 
         
        
    //     $model= new DataTesting;
    //     $model->nama= $data[$i]->nama;;
    //     $model->pekerjaan=$data[$i]->pekerjaan;;
    //     $model->jumlahPengajuan=$data[$i]->jumlahPengajuan;;
    //     $model->jenisPembayaran=$data[$i]->jenisPembayaran;
    //     $model->jangkaWaktu=$data[$i]->jangkaWaktu;
    //     $model->metodePembayaran=$data[$i]->metodePembayaran;
    //     $model->kapasitasBulanan=$data[$i]->kapasitasBulanan;
    //     $model->keterangan=$data[$i]->keterangan;
    //     $model->prediksi='coba lancar';
    //     $model->save();
    // }
    $atribut=Atribut::all(); 
    $jumlahlancar=DB::table('dataset')->where('keterangan', '=', 'Lancar') ->get()->count() ;
    $jumlahtidaklancar=DB::table('dataset')->where('keterangan', '=', 'Tidak Lancar') ->get()->count() ;

    //hitung data training tidak lancar
    $hitungtidaklancar=DB::table('datatraining')->where('keterangan','=','Tidak Lancar')->get()->count();
    //hitung data training lancar
    $hitunglancar=DB::table('datatraining')->where('keterangan','=','Lancar')->get()->count();

    $probtidaklancar=(round($hitungtidaklancar/$jumlahtidaklancar,5));
    $problancar=$hitunglancar/$jumlahlancar;

    // nilai probabilitas setiap atribut
    //pekerjaan
    $htgpekerjaan1=DB::table('datatraining')->where('pekerjaan','=','PNS')->where('keterangan','=','Lancar');
    $htgpekerjaan2=DB::table('datatraining')->where('pekerjaan','=','Pedagang')->where('keterangan','=','Lancar');
    $htgpekerjaan3=DB::table('datatraining')->where('pekerjaan','=','Karyawan')->where('keterangan','=','Lancar');
  //pengajuan
    $hitungpengajuan1=DB::table('datatraining')->where('jumlahPengajuan','=','<=5000000')->where('keterangan','=','Lancar') ->get()->count();
    $hitungpengajuan2=DB::table('datatraining')->where('jumlahPengajuan','=','<=20000000')->where('keterangan','=','Lancar') ->get()->count();
    $hitungpengajuan3=DB::table('datatraining')->where('jumlahPengajuan','=','<=30000000')->where('keterangan','=','Lancar') ->get()->count();
    $hitungpengajuan4=DB::table('datatraining')->where('jumlahPengajuan','=','<=50000000')->where('keterangan','=','Lancar') ->get()->count();
    $hitungpengajuan5=DB::table('datatraining')->where('jumlahPengajuan','=','<=300000000')->where('keterangan','=','Lancar') ->get()->count();
  //jenis pembayaran
    $htgjnspembayaran1=DB::table('datatraining')->where('jenisPembayaran','=','Angsur')->where('keterangan','=','Lancar')->get()->count();
    $htgjnspembayaran2=DB::table('datatraining')->where('jenisPembayaran','=','Tempo')->where('keterangan','=','Lancar')->get()->count();
  //jangka waktu
    $htgwaktu1=DB::table('datatraining')->where('jangkaWaktu','=','3')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktu2=DB::table('datatraining')->where('jangkaWaktu','=','6')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktu3=DB::table('datatraining')->where('jangkaWaktu','=','12')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktu4=DB::table('datatraining')->where('jangkaWaktu','=','24')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktu5=DB::table('datatraining')->where('jangkaWaktu','=','36')->where('keterangan','=','Lancar')->get()->count();
    //metode pembayaran
    $pembayaran=DB::table('datatraining')->where('metodePembayaran','=','Transfer')->where('keterangan','=','Lancar')->get()->count();
    $pembayaran=DB::table('datatraining')->where('metodePembayaran','=','Kantor KSPPS BMT Al Ikhwan')->where('keterangan','=','Lancar')->get()->count();


    //tidak lancar
    //pekerjaan
    $htgpekerjaantdklancar1=DB::table('datatraining')->where('pekerjaan','=','PNS')->where('keterangan','=','Tidak Lancar');
    $htgpekerjaantdklancar2=DB::table('datatraining')->where('pekerjaan','=','Pedagang')->where('keterangan','=','Tidak Lancar');
    $htgpekerjaantdklancar3=DB::table('datatraining')->where('pekerjaan','=','Karyawan')->where('keterangan','=','Tidak Lancar');
    //pengajuan
    $htgpengajuantdklancar1=DB::table('datatraining')->where('jumlahPengajuan','=','<=5000000')->where('keterangan','=','Tidak Lancar') ->get()->count();
    $htgpengajuantdklancar2=DB::table('datatraining')->where('jumlahPengajuan','=','<=20000000')->where('keterangan','=','Tidak Lancar') ->get()->count();
    $htgpengajuantdklancar3=DB::table('datatraining')->where('jumlahPengajuan','=','<=30000000')->where('keterangan','=','Tidak Lancar') ->get()->count();
    $htgpengajuantdklancar4=DB::table('datatraining')->where('jumlahPengajuan','=','<=50000000')->where('keterangan','=','Tidak Lancar') ->get()->count();
    $htgpengajuantdklancar5=DB::table('datatraining')->where('jumlahPengajuan','=','<=300000000')->where('keterangan','=','Tidak Lancar') ->get()->count();
    //jenis pembayaran
    $htgjnspembayarantdklancar1=DB::table('datatraining')->where('jenisPembayaran','=','Angsur')->where('keterangan','=','Tidak Lancar')->get()->count();
    $htgjnspembayarantdklancar2=DB::table('datatraining')->where('jenisPembayaran','=','Tempo')->where('keterangan','=','Tidak Lancar')->get()->count();
    //jangka waktu
    $htgwaktutdklancar1=DB::table('datatraining')->where('jangkaWaktu','=','3')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktutdklancar2=DB::table('datatraining')->where('jangkaWaktu','=','6')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktutdklancar3=DB::table('datatraining')->where('jangkaWaktu','=','12')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktutdklancar4=DB::table('datatraining')->where('jangkaWaktu','=','24')->where('keterangan','=','Lancar')->get()->count();
    $htgwaktutdklancar5=DB::table('datatraining')->where('jangkaWaktu','=','36')->where('keterangan','=','Lancar')->get()->count();
    //metode pembayaran
    $pembayarantdklancar=DB::table('datatraining')->where('metodePembayaran','=','Transfer')->where('keterangan','=','Tidak Lancar')->get()->count();
    $pembayarantdklancar=DB::table('datatraining')->where('metodePembayaran','=','Kantor KSPPS BMT Al Ikhwan')->where('keterangan','=','Tidak Lancar')->get()->count();


 echo "$hitungpengajuan1<br>$hitungpengajuan2<br>$hitungpengajuan3<br>$hitungpengajuan4<br>$hitungpengajuan5";
    // while ($atribut) {
    //     echo $atribut;
    // }

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