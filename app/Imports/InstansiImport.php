<?php

namespace App\Imports;

use App\Models\Instansi;
use Maatwebsite\Excel\Concerns\ToModel;

class InstansiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Instansi([
            //
            'nama' => $row[0],
            'alamat' => $row[1],
            'telepon' => $row[2],
            'penanggung_jawab_id' => $row[3] ?? null,
        ]);
    }
}
