<?php

namespace App\Http\Controllers;

use App\Models\JenisDonasi;
use Illuminate\Http\Request;
use App\Imports\JenisDonasiImport;
use Maatwebsite\Excel\Facades\Excel;

class JenisDonasiController extends Controller
{
    public function index()
    {
        return response()->json(JenisDonasi::with('donasis')->get());
    }

    public function show($id)
    {
        return response()->json(JenisDonasi::with('donasis')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:Zakat,Infak,Wakaf',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisDonasi = JenisDonasi::create($data);
        return response()->json($jenisDonasi, 201);
    }

    public function update(Request $request, $id)
    {
        $jenisDonasi = JenisDonasi::findOrFail($id);

        $data = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'jenis' => 'sometimes|in:Zakat,Infak,Wakaf',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisDonasi->update($data);
        return response()->json($jenisDonasi);
    }

    public function destroy($id)
    {
        $jenisDonasi = JenisDonasi::findOrFail($id);
        $jenisDonasi->delete();

        return response()->json(['message' => 'Jenis donasi deleted']);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new JenisDonasiImport, $request->file('file'));

        return response()->json(['message' => 'Import jenis donasi berhasil']);
    }
}
