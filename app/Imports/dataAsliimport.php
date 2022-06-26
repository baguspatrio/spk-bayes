<?php

namespace App\Imports;

use App\Models\DataAsliModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class dataAsliimport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {       
        return new DataAsliModel([
            'nama'=>$row['nama'],
            'pekerjaan'=>$row['pekerjaan'],
            'jumlahPengajuan'=>$row['jumlahpengajuan'],
            'jenisPembayaran'=>$row['jenispembayaran'],
            'jangkaWaktu'=>$row['jangkawaktu'],
            'metodePembayaran'=>$row['metodepembayaran'],
            'kapasitasBulanan'=>$row['kapasitasbulanan'],
            'keterangan'=>$row['keterangan'],
            
        ]);
    }
}
