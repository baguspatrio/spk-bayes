<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUji extends Model
{
    use HasFactory;
    use HasFactory;
     protected $table="hasiluji";
       protected $fillable = [
        'nama',
        'pekerjaan',
        'jumlahPengajuan',
        'jenisPembayaran',
        'jangkaWaktu',
        'metodePembayaran',
        'pendapatan',
        'pengeluaran',
        'kapasitasBulanan',
        'keterangan',
      ];
}
