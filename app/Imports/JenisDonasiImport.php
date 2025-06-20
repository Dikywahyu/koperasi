<?php

namespace App\Imports;

use App\Models\JenisDonasi;
use Maatwebsite\Excel\Concerns\ToModel;

class JenisDonasiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new JenisDonasi([
            //
            'nama' => $row[0],
            'jenis' => $row[1],
            'deskripsi' => $row[2] ?? null,
        ]);
    }
}
