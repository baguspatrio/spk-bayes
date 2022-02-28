<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAsliModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\dataAsliimport;

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
        //
    }

    public function importExcel(Request $request){

        Excel::import(new dataAsliimport, request()->file('file'));
        //validasi
        // $this->validate($request,
        // [
        //     'file'=>'required|mimes:csv,xls,xlsx'
        // ]);

        // $file=$request->file('file');

        // $nama_file = rand().$file->getClientOriginalName();
        // //upload file ke folder
        // $file->move('filedata',$nama_file);

        // //membuat nama file unik
		
        // //import file
        // Excel::import(new dataAsliimport, public_path('/filedata/'.$nama_file));

        return redirect()->back();
    }
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
