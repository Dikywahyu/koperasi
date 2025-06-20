<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        $instansis = Instansi::with('penanggungJawab')->latest()->get();
        return response()->json($instansis);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'penanggung_jawab_id' => 'nullable|exists:donaturs,id',
        ]);

        $instansi = Instansi::create($validated);

        return response()->json($instansi, 201);
    }

    public function show($id)
    {
        $instansi = Instansi::with('penanggungJawab')->findOrFail($id);
        return response()->json($instansi);
    }

    public function update(Request $request, $id)
    {
        $instansi = Instansi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'penanggung_jawab_id' => 'nullable|exists:donaturs,id',
        ]);

        $instansi->update($validated);

        return response()->json($instansi);
    }

    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();

        return response()->json(['message' => 'Instansi deleted']);
    }
}
