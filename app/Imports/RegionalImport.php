<?php

namespace App\Imports;

use App\Models\Regional;
use Maatwebsite\Excel\Concerns\ToModel;

class RegionalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Regional([
            //
            'nama' => $row[0],
            'kode' => $row[1],
        ]);
    }
}
