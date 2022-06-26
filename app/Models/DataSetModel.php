<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSetModel extends Model
{
    use HasFactory;
     protected $table="dataset";
       protected $fillable = [
        'nama',
        'pekerjaan',
        'jumlahPengajuan',
        'jenisPembayaran',
        'jangkaWaktu',
        'metodePembayaran',
        'kapasitasBulanan',
        
    ];
}
