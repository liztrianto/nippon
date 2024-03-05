<?php

namespace App\Imports;

use App\Models\Toko;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class TokoImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    // }
    public function model(array $row)
    {
        return new Toko([
            'kode_sap' => $row[0],
            'kode_sip' => $row[1],
            'nama_toko' => $row[2],
            'alamat' => $row[3],
            'depo_id' => $row[4],
            'kota' => $row[5],
            'nama_pemilik' => $row[6],
            'no_telp' => $row[7],
            'status' => 1,
        ]);
    }
}
