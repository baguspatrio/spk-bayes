<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAsliModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\dataAsliimport;
use App\Models\DataSetModel;
use DB;

class DataAsliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DataAsliModel::all();
        return view('dataasli.dataasli',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function importExcel(Request $request){

        Excel::import(new dataAsliimport, request()->file('file'));
        return redirect()->back();
    }
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
        $model->save();
        return redirect()->back();
    }

    public function show($id)
    {
       $data = DataAsliModel::find($id);
        return view('dataasli.dataasli', compact('data'));
    }

    
    public function edit($id)
    {
       $data = DataAsliModel::find($id);
        return view('dataasli.dataasli', compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function hapusDuplikat(){
        $jumlahduplikat=1;
        $data=DataAsliModel::all();
        foreach ($data as $key ) {
            $id=$key->id;
            $nama=$key->nama;
            $pekerjaan=$key->pekerjaan;
            $jumlahPengajuan=$key->jumlahPengajuan;
            $jenisPembayaran=$key->jenisPembayaran;
            $jangkaWaktu=$key->jangkaWaktu;
            $metodePembayaran=$key->metodePembayaran;
            $kapasitasBulanan=$key->kapasitasBulanan;
            $keterangan=$key->keterangan;

            $flag=DB::table('data_asli')
            ->where('nama','=',$nama)
            ->where('pekerjaan','=',$pekerjaan)
            ->where('jumlahPengajuan','=',$jumlahPengajuan)
            ->where('jenisPembayaran','=',$jenisPembayaran)
            ->where('jangkaWaktu','=',$jangkaWaktu)
            ->where('metodePembayaran','=',$metodePembayaran)
            ->where('kapasitasBulanan','=',$kapasitasBulanan)
            ->where('keterangan','=',$keterangan)
            
            ->get();

            if ($flag->count()>1) {

               $hapus=DataAsliModel::find($id);
               $hapus->delete();
               $jumlahduplikat++;
            }
           
        }
      return redirect()->back();
    }

    public function transform(){

    $data=DataAsliModel::all();
       $jumlahduplikat=1;
        foreach ($data as $key ) {
            $id=$key->id;
            $nama=$key->nama;
            $pekerjaan=$key->pekerjaan;
            $jumlahPengajuan=$key->jumlahPengajuan;
            $jenisPembayaran=$key->jenisPembayaran;
            $jangkaWaktu=$key->jangkaWaktu;
            $metodePembayaran=$key->metodePembayaran;
            $kapasitasBulanan=$key->kapasitasBulanan;
            $keterangan=$key->keterangan;


        if ($jumlahPengajuan<=5000000) {
            $jumlahPengajuan='<=5000000';
        }elseif ($jumlahPengajuan<=20000000) {

            $jumlahPengajuan='<=20000000';
        }elseif ($jumlahPengajuan<=30000000) {
            $jumlahPengajuan='=30000000';
        }elseif ($jumlahPengajuan<=50000000) {
            $jumlahPengajuan='<=50000000';
          
        }else {
            $jumlahPengajuan='<=300000000';
        }
        
           
        $model=new DataSetModel;
        $model->nama=$nama;
        $model->pekerjaan=$pekerjaan;
        $model->jumlahPengajuan=$jumlahPengajuan;
        $model->jenisPembayaran=$jenisPembayaran;
        $model->jangkaWaktu=$jangkaWaktu;
        $model->metodePembayaran=$metodePembayaran;
        $model->kapasitasBulanan=$kapasitasBulanan;
        $model->keterangan=$keterangan; 
        $model->save();
        
            
         
        }
         $data=DataSetModel::all();
       $jumlahduplikat=1;
        foreach ($data as $key ) {
            $id=$key->id;
            $nama=$key->nama;
            $pekerjaan=$key->pekerjaan;
            $jumlahPengajuan=$key->jumlahPengajuan;
            $jenisPembayaran=$key->jenisPembayaran;
            $jangkaWaktu=$key->jangkaWaktu;
            $metodePembayaran=$key->metodePembayaran;
            $kapasitasBulanan=$key->kapasitasBulanan;
            $keterangan=$key->keterangan;

        $flag=DB::table('dataset')
            ->where('nama','=',$nama)
            ->where('pekerjaan','=',$pekerjaan)
            ->where('jumlahPengajuan','=',$jumlahPengajuan)
            ->where('jenisPembayaran','=',$jenisPembayaran)
            ->where('jangkaWaktu','=',$jangkaWaktu)
            ->where('metodePembayaran','=',$metodePembayaran)
            ->where('kapasitasBulanan','=',$kapasitasBulanan)
            ->where('keterangan','=',$keterangan)
            
            ->get();

        if ($flag->count()>1) 

               $hapus=DataSetModel::find($id);
               $hapus->delete();
               $jumlahduplikat++;
        
    }
        


     
    return redirect()->back();
   }
   
    public function destroy($id)
    {
        $data= DataAsliModel::find($id);
        $data->delete();
        return redirect()->back();
    }
}
