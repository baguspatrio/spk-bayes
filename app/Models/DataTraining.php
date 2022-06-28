<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTraining extends Model
{
    use HasFactory;
     protected $table="datatraining";
       protected $fillable = [
        'nama',
        'pekerjaan',
        'jumlahPengajuan',
        'jenisPembayaran',
        'jangkaWaktu',
        'metodePembayaran',
        'kapasitasBulanan',
        'keterangan',
        'prediksi',
      ];
}
