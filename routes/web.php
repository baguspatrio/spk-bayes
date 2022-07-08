<?php


use App\Http\Controllers\DataAsliController;
use App\Http\Controllers\DataSetController;
use App\Http\Controllers\DataUjiController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTrainingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class,'index']);
Route::resource('dataasli', DataAsliController::class);
Route::post('importfile',[ DataAsliController::class,'importExcel']);
Route::get('hapusduplikat',[DataAsliController::class,'hapusDuplikat']);
Route::get('transform',[DataAsliController::class,'transform']);
Route::resource('dataset',DataSetController::class);
Route::get('ujidataset',[DataSetController::class,'ujidataset']);
Route::resource('datauji',DataUjiController::class);
Route::resource('pemodelan',PerhitunganController::class);
Route::resource('datatraining',DataTrainingController::class);