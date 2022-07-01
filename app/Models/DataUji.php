<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUji extends Model
{
    use HasFactory;
     protected $table="datauji";
       protected $fillable = [
        'nama',
        'pekerjaan',
        'jumlahPengajuan',
        'jenisPembayaran',
        'jangkaWaktu',
        'metodePembayaran',
        'kapasitasBulanan',
        'keterangan',
      ];
}
