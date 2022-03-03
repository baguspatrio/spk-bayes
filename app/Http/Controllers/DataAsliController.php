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
        return redirect()->back();
    }
    public function store(Request $request)
    {
        //
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

   
    public function destroy($id)
    {
        $data= DataAsliModel::find($id);
        $data->delete();
        return redirect()->back();
    }
}
