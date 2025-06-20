<?php

namespace App\Imports;

use App\Models\Cabang;
use Maatwebsite\Excel\Concerns\ToModel;

class CabangImport implements ToModel
{
    public function model(array $row)
    {
        return new Cabang([
            'regional_id' => $row[0],
            'nama'        => $row[1],
            'kode'        => $row[2],
            'alamat'      => $row[3],
            'telepon'     => $row[4],
        ]);
    }
}
