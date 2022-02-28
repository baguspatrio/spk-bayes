<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsliModel extends Model
{
    use HasFactory;
    
    protected $table="data_asli";
       protected $fillable = [
        'kepribadian',
        'statusRumah',
        'statusTempatusaha',
        'jumlahTanggungan',
        'kemampuan',
        'jumlahPinjaman',
        'nilaiJaminan',
        'angsuran',
        'lamaAngsuran',
        'keterangan',
    ];

}
