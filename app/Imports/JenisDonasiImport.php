<?php

namespace App\Imports;

use App\Models\JenisDonasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisDonasiImport implements ToModel, WithHeadingRow
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
            'nama' => $row['nama'],
            'jenis' => $row['jenis'],
            'deskripsi' => $row['deskripsi'] ?? null,
        ]);
    }
}
