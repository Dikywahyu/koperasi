<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Imports\CabangImport;
use Maatwebsite\Excel\Facades\Excel;

class CabangController extends Controller
{
    public function index()
    {
        return response()->json(Cabang::with('regional', 'ziscos')->get());
    }

    public function show($id)
    {
        return response()->json(Cabang::with('regional', 'ziscos')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'regional_id' => 'required|exists:regionals,id',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
        ]);

        $cabang = Cabang::create($data);
        return response()->json($cabang, 201);
    }

    public function update(Request $request, $id)
    {
        $cabang = Cabang::findOrFail($id);

        $data = $request->validate([
            'regional_id' => 'sometimes|exists:regionals,id',
            'nama' => 'sometimes|string|max:255',
            'kode' => 'sometimes|string|max:50|unique:cabangs,kode,' . $id,
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
        ]);

        $cabang->update($data);
        return response()->json($cabang);
    }

    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();
        return response()->json(['message' => 'Cabang deleted']);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new CabangImport, $request->file('file'));

        return response()->json(['message' => 'Import cabang berhasil']);
    }
}
