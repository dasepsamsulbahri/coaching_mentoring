<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    public function model(array $row)
    {
        return new Peserta([
            'id'            => $row[0],
            'id_kegiatan'   => $row[1],
            'nip'           => $row[2],
            'name'          => $row[3],
            'unit_kerja'    => $row[4],
            'satuan_kerja'  => $row[5],
            'jabatan'       => $row[6],
            'pangkat'       => $row[7],
            'golongan'      => $row[8],
        ]);
    }
}