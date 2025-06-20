<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function index()
    {
        return response()->json(Kwitansi::with('donasi')->get());
    }

    public function show($id)
    {
        return response()->json(Kwitansi::with('donasi')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donasi_id' => 'required|exists:donasis,id',
            'total' => 'required|numeric|min:0',
            'komisi_zisco' => 'required|numeric|min:0',
            'dicetak' => 'boolean',
            'bulan_donasi' => 'required|date',
        ]);

        $kwitansi = Kwitansi::create($data); // Nomor transaksi akan auto-generate di model
        return response()->json($kwitansi, 201);
    }

    public function update(Request $request, $id)
    {
        $kwitansi = Kwitansi::findOrFail($id);

        $data = $request->validate([
            'donasi_id' => 'sometimes|exists:donasis,id',
            'total' => 'sometimes|numeric|min:0',
            'komisi_zisco' => 'sometimes|numeric|min:0',
            'dicetak' => 'boolean',
            'bulan_donasi' => 'sometimes|date',
        ]);

        $kwitansi->update($data);
        return response()->json($kwitansi);
    }

    public function destroy($id)
    {
        $kwitansi = Kwitansi::findOrFail($id);
        $kwitansi->delete();

        return response()->json(['message' => 'Kwitansi deleted']);
    }
}
