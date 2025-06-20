<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return response()->json(Donasi::with(['donatur', 'jenisDonasi', 'zisco', 'kwitansi'])->get());
    }

    public function show($id)
    {
        return response()->json(Donasi::with(['donatur', 'jenisDonasi', 'zisco', 'kwitansi'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'jenis_donasi_id' => 'required|exists:jenis_donasis,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'nominal' => 'required|numeric|min:0',
            'bulan_donasi' => 'required|date',
            'metode' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $donasi = Donasi::create($data);
        return response()->json($donasi, 201);
    }

    public function update(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);

        $data = $request->validate([
            'donatur_id' => 'sometimes|exists:donaturs,id',
            'jenis_donasi_id' => 'sometimes|exists:jenis_donasis,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'nominal' => 'sometimes|numeric|min:0',
            'bulan_donasi' => 'sometimes|date',
            'metode' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $donasi->update($data);
        return response()->json($donasi);
    }

    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->delete();

        return response()->json(['message' => 'Donasi deleted']);
    }
}
