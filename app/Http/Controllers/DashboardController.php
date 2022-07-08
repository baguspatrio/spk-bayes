<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perhitungan;
use App\Models\DataAsliModel;
use App\Models\DataSetModel;
use App\Models\DataTraining;
use App\Models\DataTesting;
use App\Models\DataUji;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DataTesting::all()->count();
        $datatesting=DB::table('datatesting')->limit(10)->where('prediksi','=','Lancar')->get();
        $training=DataTraining::all()->count();
        $layak=DataTesting::all()->where('keterangan','=','Lancar')->count();
        $macet=DataTesting::all()->where('keterangan','=','Tidak Lancar')->count();
        return view('dashboard',compact('data','training','layak','macet','datatesting'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
