<?php

namespace App\Imports;

use App\Models\Cabang;
use App\Models\Regional;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CabangImport implements ToModel, WithHeadingRow
{
    protected $regionals;

    public function __construct()
    {
        // Ambil semua regional sekali saja, mapping berdasarkan kode
        $this->regionals = Regional::pluck('id', 'kode')->toArray();
    }

    public function model(array $row)
    {
        $regionalId = $this->regionals[$row['regional_kode']] ?? null;

        return new Cabang([
            'regional_id' => $regionalId,
            'nama'        => $row['nama'],
            'alamat'      => $row['alamat'],
            'telepon'     => $row['telepon'],
        ]);
    }
}
