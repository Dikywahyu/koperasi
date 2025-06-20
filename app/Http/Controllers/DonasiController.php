<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $donasis = Donasi::with(['donatur', 'zisco', 'jenisDonasi'])->latest()->get();
        return response()->json($donasis);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'jenis_donasi_id' => 'required|exists:jenis_donasis,id',
            'nominal' => 'required|numeric',
            'bulan_donasi' => 'required|date',
            'metode' => 'nullable|string|max:100',
        ]);

        $donasi = Donasi::create($validated);

        return response()->json($donasi, 201);
    }

    public function show($id)
    {
        $donasi = Donasi::with(['donatur', 'zisco', 'jenisDonasi'])->findOrFail($id);
        return response()->json($donasi);
    }

    public function update(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);

        $validated = $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'jenis_donasi_id' => 'required|exists:jenis_donasis,id',
            'nominal' => 'required|numeric',
            'bulan_donasi' => 'required|date',
            'metode' => 'nullable|string|max:100',
        ]);

        $donasi->update($validated);

        return response()->json($donasi);
    }

    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->delete();

        return response()->json(['message' => 'Donasi deleted']);
    }
}
