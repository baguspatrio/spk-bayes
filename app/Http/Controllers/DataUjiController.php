<?php

namespace App\Http\Controllers;

use App\Models\DataUji;
use Illuminate\Http\Request;
use App\Models\Perhitungan;
use App\Models\HasilUji;
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

        $model= new Datauji;
        $model->nama=$request->nama;
        $model->pekerjaan=$request->pekerjaan;
        $model->jumlahPengajuan=$request->jumlahPengajuan;
        $model->jenisPembayaran=$request->jenisPembayaran;
        $model->jangkaWaktu=$request->jangkaWaktu;
        $model->metodePembayaran=$request->metodePembayaran;
        $model->pendapatan=$request->pendapatan;
        $model->pengeluaran=$request->pengeluaran;
        $model->save();
        return redirect()->back();
    }

    //uji data pengajuan baru
    public function ujidatapengajuan(){
    
     HasilUji::truncate();
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
    $pendapatan=$key->pendapatan;
    $pengeluaran=$key->pengeluaran;
    $kapasitasBulanan=$key->kapasitasBulanan;

    //pengkatogorian
    if ($jangkaWaktu<=3) {
            $jangkaWaktu='3';
          
        }elseif ($jangkaWaktu<=6) {
            $jangkaWaktu='6';
        }elseif ($jangkaWaktu<=12) {
            $jangkaWaktu='12';
        }elseif ($jangkaWaktu<=24) {

            $jangkaWaktu='24';
        }else {
            $jangkaWaktu='36';
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
        
     
       

        // dd($jangkaWaktu);
        $model=new HasilUji;
        $model->nama=$nama;
        $model->pekerjaan=$pekerjaan;
        $model->jumlahPengajuan=$jumlahPengajuan;
        $model->jenisPembayaran=$jenisPembayaran;
        $model->jangkaWaktu=$jangkaWaktu;
        $model->metodePembayaran=$metodePembayaran;
        $model->kapasitasBulanan=$kapasitasBulanan;
        $model->keterangan='lancar'; 
        $model->save();
        
          
     }
     $datauji=HasilUji::all();
     foreach ($datauji as $key ) {
        $id=$key->id;
        $nama=$key->nama;
        $pekerjaan=$key->pekerjaan;
        $jumlahPengajuan=$key->jumlahPengajuan;
        $jenisPembayaran=$key->jenisPembayaran;
        $jangkaWaktu=$key->jangkaWaktu;
        $metodePembayaran=$key->metodePembayaran;
        $kapasitasBulanan=$key->kapasitasBulanan;
     
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
    $mtdpembayarantidaklancar=$nilaimtdpembayarantdklancar['0']->probMacet;
    $nilaikapasitasBulanantdklancar=DB::table('perhitungan')->where('nilai','=',$kapasitasBulanan)->get()->toArray();
    $kapasitasbulanantidaklancar=$nilaikapasitasBulanantdklancar['0']->probMacet;

    $tidaklancar=(round($pekerkjaantdklancar*$jmlpengajuantdklancar*$jnspembayarantdklancar*$jgkwaktutdklancar*$mtdpembayarantidaklancar*$kapasitasbulanantidaklancar,5)) ;


     if ($lancar>$tidaklancar) {
        $prediksi="Lancar";
    }else {
        $prediksi="Tidak Lancar";
    }
    
    
    $model=HasilUji::find($id);
    $model->nama = $nama;
    $model->pekerjaan = $pekerjaan;
    $model->jumlahPengajuan = $jumlahPengajuan;
    $model->jenisPembayaran= $jenisPembayaran;
    $model->jangkaWaktu=$jangkaWaktu;
    $model->metodePembayaran=$metodePembayaran;
    $model->kapasitasBulanan=$kapasitasBulanan;
    $model->keterangan= $prediksi;
    $model->save();
     }
     
   
     return redirect()->route('hasiluji.index');
   }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataUji  $dataUji
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
     * @param  \App\Models\DataUji  $dataUji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model=DataUji::find($id);
        $model->nama=$request->nama;
        $model->pekerjaan=$request->pekerjaan;
        $model->jumlahPengajuan=$request->jumlahPengajuan;
        $model->jenisPembayaran=$request->jenisPembayaran;
        $model->jangkaWaktu=$request->jangkaWaktu;
        $model->metodePembayaran=$request->metodePembayaran;
        $model->pendapatan=$request->pendapatan;
        $model->pengeluaran=$request->pengeluaran;
        $model->save();
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataUji  $dataUji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= DataUji::find($id);
        $data->delete();
        return redirect()->back();
    }
}
