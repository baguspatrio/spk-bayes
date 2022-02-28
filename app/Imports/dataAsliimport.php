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
            'kepribadian'=>$row['kepribadian'],
            'statusRumah'=>$row['statusrumah'],
            'statusTempatusaha'=>$row['statustempatusaha'],
            'jumlahTanggungan'=>$row['jumlahtanggungan'],
            'kemampuan'=>$row['kemampuan'],
            'jumlahPinjaman'=>$row['jumlahpinjaman'],
            'nilaiJaminan'=>$row['nilaijaminan'],
            'angsuran'=>$row['angsuran'],
            'lamaAngsuran'=>$row['lamaangsuran'],
            'keterangan'=>$row['keterangan'],
        ]);
    }
}
