<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Imports\InstansiImport;
use Maatwebsite\Excel\Facades\Excel;

class InstansiController extends Controller
{
    public function index()
    {
        return response()->json(Instansi::with('penanggungJawab', 'donaturs')->get());
    }

    public function show($id)
    {
        return response()->json(Instansi::with('penanggungJawab', 'donaturs')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'penanggung_jawab_id' => 'nullable|exists:donaturs,id',
        ]);

        $instansi = Instansi::create($data);
        return response()->json($instansi, 201);
    }

    public function update(Request $request, $id)
    {
        $instansi = Instansi::findOrFail($id);

        $data = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'penanggung_jawab_id' => 'nullable|exists:donaturs,id',
        ]);

        $instansi->update($data);
        return response()->json($instansi);
    }

    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();
        return response()->json(['message' => 'Instansi deleted']);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new InstansiImport, $request->file('file'));

        return response()->json(['message' => 'Import instansi berhasil']);
    }
}
