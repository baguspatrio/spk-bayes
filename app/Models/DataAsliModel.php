<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsliModel extends Model
{
    use HasFactory;
    
    protected $table="data_asli";
       protected $fillable = [
        'nama',
        'pekerjaan',
        'jumlahPengajuan',
        'jenisPembayaran',
        'jangkaWaktu',
        'metodePembayaran',
        'pendapatan',
        'pengeluaran',
        'keterangan',
        
    ];

}
