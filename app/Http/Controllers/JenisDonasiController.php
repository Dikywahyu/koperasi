<?php

namespace App\Http\Controllers;

use App\Models\JenisDonasi;
use Illuminate\Http\Request;

class JenisDonasiController extends Controller
{
    public function index()
    {
        $jenisDonasis = JenisDonasi::latest()->get();
        return response()->json($jenisDonasis);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:Zakat,Infak,Wakaf',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisDonasi = JenisDonasi::create($validated);

        return response()->json($jenisDonasi, 201);
    }

    public function show($id)
    {
        $jenisDonasi = JenisDonasi::findOrFail($id);
        return response()->json($jenisDonasi);
    }

    public function update(Request $request, $id)
    {
        $jenisDonasi = JenisDonasi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:Zakat,Infak,Wakaf',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisDonasi->update($validated);

        return response()->json($jenisDonasi);
    }

    public function destroy($id)
    {
        $jenisDonasi = JenisDonasi::findOrFail($id);
        $jenisDonasi->delete();

        return response()->json(['message' => 'Jenis Donasi deleted']);
    }
}
