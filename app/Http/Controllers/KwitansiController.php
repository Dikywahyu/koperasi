<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function index()
    {
        $kwitansis = Kwitansi::with('donasi')->latest()->get();
        return response()->json($kwitansis);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donasi_id' => 'required|exists:donasis,id',
            'nomor_transaksi' => 'required|uuid|unique:kwitansis,nomor_transaksi',
            'total' => 'required|numeric',
            'komisi_zisco' => 'required|numeric',
            'dicetak' => 'nullable|boolean',
            'bulan_donasi' => 'required|date',
        ]);

        $kwitansi = Kwitansi::create($validated);

        return response()->json($kwitansi, 201);
    }

    public function show($id)
    {
        $kwitansi = Kwitansi::with('donasi')->findOrFail($id);
        return response()->json($kwitansi);
    }

    public function update(Request $request, $id)
    {
        $kwitansi = Kwitansi::findOrFail($id);

        $validated = $request->validate([
            'donasi_id' => 'required|exists:donasis,id',
            'nomor_transaksi' => 'required|uuid|unique:kwitansis,nomor_transaksi,' . $id,
            'total' => 'required|numeric',
            'komisi_zisco' => 'required|numeric',
            'dicetak' => 'nullable|boolean',
            'bulan_donasi' => 'required|date',
        ]);

        $kwitansi->update($validated);

        return response()->json($kwitansi);
    }

    public function destroy($id)
    {
        $kwitansi = Kwitansi::findOrFail($id);
        $kwitansi->delete();

        return response()->json(['message' => 'Kwitansi deleted']);
    }
}
