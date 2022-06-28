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
    $htgpekerjaan1=DB::table('datatraining')->where('pekerjaan','=','PNS')->where('keterangan','=','Lancar')->get()->count();
    $htgpekerjaan2=DB::table('datatraining')->where('pekerjaan','=','Pedagang')->where('keterangan','=','Lancar')->get()->count();
    $htgpekerjaan3=DB::table('datatraining')->where('pekerjaan','=','Karyawan')->where('keterangan','=','Lancar')->get()->count();
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
    $pembayaran1=DB::table('datatraining')->where('metodePembayaran','=','Transfer')->where('keterangan','=','Lancar')->get()->count();
    $pembayaran2=DB::table('datatraining')->where('metodePembayaran','=','Kantor KSPPS BMT Al Ikhwan')->where('keterangan','=','Lancar')->get()->count();


    //tidak lancar
    //pekerjaan
    $htgpekerjaantdklancar1=DB::table('datatraining')->where('pekerjaan','=','PNS')->where('keterangan','=','Tidak Lancar')->get()->count();
    $htgpekerjaantdklancar2=DB::table('datatraining')->where('pekerjaan','=','Pedagang')->where('keterangan','=','Tidak Lancar')->get()->count();
    $htgpekerjaantdklancar3=DB::table('datatraining')->where('pekerjaan','=','Karyawan')->where('keterangan','=','Tidak Lancar')->get()->count();
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
    $pembayarantdklancar1=DB::table('datatraining')->where('metodePembayaran','=','Transfer')->where('keterangan','=','Tidak Lancar')->get()->count();
    $pembayarantdklancar2=DB::table('datatraining')->where('metodePembayaran','=','Kantor KSPPS BMT Al Ikhwan')->where('keterangan','=','Tidak Lancar')->get()->count();

    //probabilitas atribut lancar
    //pekerjaan
    $probpns=(round($htgpekerjaan1/$jumlahlancar,5)) ;
    $probpedagang=(round($htgpekerjaan2/$jumlahlancar,5));
    $probkaryawan=(round($htgpekerjaan3/$jumlahlancar,5));
    //jumlah pengajuan
    $probpengajuan1=(round($hitungpengajuan1/$jumlahlancar,5));
    $probpengajuan2=(round($hitungpengajuan2/$jumlahlancar,5));
    $probpengajuan3=(round($hitungpengajuan3/$jumlahlancar,5));
    $probpengajuan4=(round($hitungpengajuan4/$jumlahlancar,5));
    $probpengajuan5=(round($hitungpengajuan5/$jumlahlancar,5));
    //jenispembayaran
    $probjnspembayaran1=(round($htgjnspembayaran1/$jumlahlancar,5));
    $probjnspembayaran2=(round($htgjnspembayaran2/$jumlahlancar,5));
    //jangka waktu
    $probjgkwaktu1=(round($htgwaktu1/$jumlahlancar,5));
    $probjgkwaktu2=(round($htgwaktu2/$jumlahlancar,5));
    $probjgkwaktu3=(round($htgwaktu3/$jumlahlancar,5));
    $probjgkwaktu4=(round($htgwaktu4/$jumlahlancar,5));
    $probjgkwaktu5=(round($htgwaktu5/$jumlahlancar,5));
    //metode pembayaran
    $probmtdpembayaran1=(round($pembayaran1/$jumlahlancar,5));
    $probmtdpembayaran2=(round($pembayaran2/$jumlahlancar,5));

    //probabilitias tidak Lancar
    //pekerjaan
    $probpnstdkLancar=(round($htgpekerjaantdklancar1/$jumlahtidaklancar,5)) ;
    $probpedagangtdkLancar=(round($htgpekerjaantdklancar2/$jumlahtidaklancar,5));
    $probkaryawantdkLancar=(round($htgpekerjaantdklancar3/$jumlahtidaklancar,5));
    
    //jumlah pengajuan
    $probpengajuantdklancar1=(round($hitungpengajuan1/$jumlahtidaklancar,5));
    $probpengajuantdklancar2=(round($hitungpengajuan2/$jumlahtidaklancar,5));
    $probpengajuantdklancar3=(round($hitungpengajuan3/$jumlahtidaklancar,5));
    $probpengajuantdklancar4=(round($hitungpengajuan4/$jumlahtidaklancar,5));
    $probpengajuantdklancar5=(round($hitungpengajuan5/$jumlahtidaklancar,5));
    //jenis pembayaran
    $probjnspembayarantdklancar1=(round($htgjnspembayarantdklancar1/$jumlahtidaklancar,5));
    $probjnspembayarantdklancar2=(round($htgjnspembayarantdklancar2/$jumlahtidaklancar,5));
    //jangka waktu 
    $probjgkwaktutdklancar1=(round($htgwaktutdklancar1/$jumlahtidaklancar,5));
    $probjgkwaktutdklancar2=(round($htgwaktutdklancar2/$jumlahtidaklancar,5));
    $probjgkwaktutdklancar3=(round($htgwaktutdklancar3/$jumlahtidaklancar,5));
    $probjgkwaktutdklancar4=(round($htgwaktutdklancar4/$jumlahtidaklancar,5));
    $probjgkwaktutdklancar5=(round($htgwaktutdklancar5/$jumlahtidaklancar,5));

    //metode pembayaran
    $probmtdpembayarantdklancar1=(round($pembayarantdklancar1/$jumlahtidaklancar,5));
    $probmtdpembayarantdklancar2=(round($pembayarantdklancar2/$jumlahtidaklancar,5));

    $lancar=$probpns*$probkaryawan*$probpedagang*$probpengajuan1*$probpengajuan2*$probpengajuan3*$probpengajuan4*$probpengajuan5*$probjnspembayaran1*$probjnspembayaran2*$probjgkwaktu1*$probjgkwaktu2*$probjgkwaktu3*$probjgkwaktu4*$probjgkwaktu5*$probmtdpembayaran1*$probmtdpembayaran2;
    $tidaklancar=$probpnstdkLancar*$probkaryawantdkLancar*$probpedagangtdkLancar*$probpengajuantdklancar1*$probpengajuantdklancar2*$probpengajuantdklancar3*$probpengajuantdklancar4*$probpengajuantdklancar4*$probpengajuantdklancar5*
    $probjnspembayarantdklancar1*$probjnspembayarantdklancar2*$probjgkwaktutdklancar1*$probjgkwaktutdklancar2*$probjgkwaktutdklancar3*$probjgkwaktutdklancar4*$probjgkwaktutdklancar5*$probmtdpembayarantdklancar1*$probmtdpembayarantdklancar2;
    
    if ($lancar>$tidaklancar) {
        $prediksi="Lancar";
    }else {
        $prediksi="Tidak Lancar";
    }
    $model=new DataTraining;
    $model->prediksi= $prediksi;
    $model->save();



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