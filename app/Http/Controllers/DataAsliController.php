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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function hapusseluruhdata(){
        DataAsliModel::truncate();
        return redirect()->route('dataasli.index');
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
        $model->pendapatan->$request->pendapatan;
        $model->pengeluaran->$request->pengeluaran;
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
        $model=DataAsliModel::find($id);
        $model->nama=$request->nama;
        $model->pekerjaan=$request->pekerjaan;
        $model->jumlahPengajuan=$request->jumlahPengajuan;
        $model->jenisPembayaran= $request->jenisPembayaran;
        $model->jangkaWaktu=$request->jangkaWaktu;
        $model->metodePembayaran=$request->metodePembayaran;
        $model->pendapatan=$request->pendapatan;
        $model->pengeluaran=$request->pengeluaran;
        $model->save();

        return redirect()->back();
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


    //preprosessing data hapus duplikat dan transformasi data
    public function transform(){

    $data=DataAsliModel::all();
        foreach ($data as $key ) {
            $id=$key->id;
            $nama=$key->nama;
            $pekerjaan=$key->pekerjaan;
            $jumlahPengajuan=$key->jumlahPengajuan;
            $jenisPembayaran=$key->jenisPembayaran;
            $jangkaWaktu=$key->jangkaWaktu;
            $metodePembayaran=$key->metodePembayaran;
            $pendapatan=$key->pendapatan;
            $pengeluaran=$key->pengeluaran;
            $keterangan=$key->keterangan;


        if ($jangkaWaktu<=3) {
            $jangkaWaktu='3';
          
        }elseif ($jangkaWaktu<=6) {
            $jangkaWaktu='6';
        }elseif ($jangkaWaktu<=12) {
            $jangkaWaktu='12';
        }elseif ($jangkaWaktu<=24) {

            $jangkaWaktu='24';
        }elseif ($jangkaWaktu<=36) {
            $jangkaWaktu='36';}
        else {
            $jangkaWaktu='48';
        }

         //kapasitasBulanan
        $waktubayar=$jangkaWaktu;
        $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
        $margin=round(($waktubayar*0.02)+1,2);
        $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
    
        if ($waktubayar==3 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 3 bulan';
        } elseif ($waktubayar==3 & $totalbulanan>$kemampuan) {
          $waktubayar=6;
            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
            $margin=round(($waktubayar*0.02)+1,2);
            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
            if ($waktubayar==6 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 6 bulan';
            }elseif ($waktubayar==6 & $totalbulanan>$kemampuan) {
            $waktubayar=12;
                $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                $margin=round(($waktubayar*0.02)+1,2);
                $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                if ($waktubayar==12 & $totalbulanan<$kemampuan) {
                    $kapasitasBulanan='Aman 12 bulan';
                }elseif ($waktubayar==12 & $totalbulanan>$kemampuan) {
                    $waktubayar=24;
                    $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                    $margin=round(($waktubayar*0.02)+1,2);
                    $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                    if ($waktubayar==24 & $totalbulanan<$kemampuan) {
                        $kapasitasBulanan='Aman 24 bulan';
                    }elseif ($waktubayar==24 & $totalbulanan>$kemampuan) {
                        $waktubayar=36;
                        $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                        $margin=round(($waktubayar*0.02)+1,2);
                        $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                        if ($waktubayar==36 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 36 bulan';
                        }elseif ($waktubayar==36 & $totalbulanan>$kemampuan) {
                            $waktubayar=48;
                            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                            $margin=round(($waktubayar*0.02)+1,2);
                            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                            if ($waktubayar==48 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 48 bulan';
                            }elseif ($waktubayar==48 & $totalbulanan>$kemampuan) {
                               $kapasitasBulanan="Tidak Aman";
                            }
                        }
                        
                    }
                }
        }
        }elseif ($waktubayar==6 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 6 bulan';
        }elseif ($waktubayar==6 & $totalbulanan>$kemampuan) {
            $waktubayar=12;
            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
            $margin=round(($waktubayar*0.02)+1,2);
            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                if ($waktubayar==12 & $totalbulanan<$kemampuan) {
                    $kapasitasBulanan='Aman 12 bulan';
                }elseif ($waktubayar==12 & $totalbulanan>$kemampuan) {
                    $waktubayar=24;
                    $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                    $margin=round(($waktubayar*0.02)+1,2);
                    $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                    if ($waktubayar==24 & $totalbulanan<$kemampuan) {
                        $kapasitasBulanan='Aman 24 bulan';
                    }elseif ($waktubayar==24 & $totalbulanan>$kemampuan) {
                        $waktubayar=36;
                        $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                        $margin=round(($waktubayar*0.02)+1,2);
                        $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                        if ($waktubayar==36 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 36 bulan';
                        }elseif ($waktubayar==36 & $totalbulanan>$kemampuan) {
                            $waktubayar=48;
                            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                            $margin=round(($waktubayar*0.02)+1,2);
                            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                            if ($waktubayar==48 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 48 bulan';
                            }elseif ($waktubayar==48 & $totalbulanan>$kemampuan) {
                               $kapasitasBulanan="Tidak Aman";
                            }
                        }
                        
                    }
                }
            
        }elseif ($waktubayar==12 & $totalbulanan>$kemampuan) {
            $waktubayar=24;
            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                    $margin=round(($waktubayar*0.02)+1,2);
                    $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                    if ($waktubayar==24 & $totalbulanan<$kemampuan) {
                        $kapasitasBulanan='Aman 24 bulan';
                    }elseif ($waktubayar==24 & $totalbulanan>$kemampuan) {
                        $waktubayar=36;
                        $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                        $margin=round(($waktubayar*0.02)+1,2);
                        $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                        if ($waktubayar==36 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 36 bulan';
                        }elseif ($waktubayar==36 & $totalbulanan>$kemampuan) {
                            $waktubayar=48;
                            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                            $margin=round(($waktubayar*0.02)+1,2);
                            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                            if ($waktubayar==48 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 48 bulan';
                            }elseif ($waktubayar==48 & $totalbulanan>$kemampuan) {
                               $kapasitasBulanan="Tidak Aman";
                            }
                        }
                        
                    }

        }elseif ($waktubayar==24 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 24 bulan';
        }elseif ($waktubayar==24 & $totalbulanan>$kemampuan) {
            $waktubayar=36;
            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
            $margin=round(($waktubayar*0.02)+1,2);
            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                 if ($waktubayar==36 & $totalbulanan<$kemampuan) {
                    $kapasitasBulanan='Aman 36 bulan';
                    }elseif ($waktubayar==36 & $totalbulanan>$kemampuan) {
                            $waktubayar=48;
                            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
                            $margin=round(($waktubayar*0.02)+1,2);
                            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                            if ($waktubayar==48 & $totalbulanan<$kemampuan) {
                            $kapasitasBulanan='Aman 48 bulan';
                            }elseif ($waktubayar==48 & $totalbulanan>$kemampuan) {
                               $kapasitasBulanan="Tidak Aman";
                            }
                    }       
        }elseif ($waktubayar==36 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 36 bulan';
        }elseif ($waktubayar==36 & $totalbulanan>$kemampuan) {
            $waktubayar=48;
            $kemampuan=round(($pendapatan-$pengeluaran)*0.25);
            $margin=round(($waktubayar*0.02)+1,2);
            $totalbulanan=round(($jumlahPengajuan*$margin)/$waktubayar);
                if ($waktubayar==48 & $totalbulanan<$kemampuan) {
                    $kapasitasBulanan='Aman 48 bulan';
                }elseif ($waktubayar==48 & $totalbulanan>$kemampuan) {
                     $kapasitasBulanan="Tidak Aman";
                    }
        }elseif ($waktubayar==48 & $totalbulanan<$kemampuan) {
            $kapasitasBulanan='Aman 48 bulan';
        }
        else {
            $kapasitasBulanan='Tidak Aman';
        }
    //    echo"$nama<br>$waktubayar<br><b>total bulanan=$totalbulanan</b><br><u><i>kemampuan:$kemampuan</i></u><br><i>pengeluaran:$pengeluaran</i><br>";
    //     dd($kapasitasBulanan);
        //jumlah pengajuan
        if ($jumlahPengajuan<=5000000) {
            $jumlahPengajuan='<=5000000';
        }elseif ($jumlahPengajuan<=20000000) {

            $jumlahPengajuan='<=20000000';
        }elseif ($jumlahPengajuan<=30000000) {
            $jumlahPengajuan='<=30000000';
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
         
        $jumlahduplikat=1;
         $data=DataSetModel::all();
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

            if ($flag->count()==0) {

               
               return redirect()->route('dataset.index');
            }elseif($flag->count()>1) {
               $hapus=DataSetModel::find($id);
               $hapus->delete();
               $jumlahduplikat++;
            }
           
        }
        


     
    return redirect()->route('dataset.index');
   }
   
    public function destroy($id)
    {
        $data= DataAsliModel::find($id);
        $data->delete();
        return redirect()->back();
    }
}
