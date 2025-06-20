<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('transaksible')->latest()->get();
        return response()->json($transaksis);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'tanggal' => 'required|date',
            'tipe' => 'required|in:simpanan,pinjaman,angsuran,lainnya',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'transaksible_type' => 'nullable|string',
            'transaksible_id' => 'nullable|integer',
        ]);

        $transaksi = Transaksi::create($validated);

        return response()->json($transaksi, 201);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('transaksible')->findOrFail($id);
        return response()->json($transaksi);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'tanggal' => 'required|date',
            'tipe' => 'required|in:simpanan,pinjaman,angsuran,lainnya',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'transaksible_type' => 'nullable|string',
            'transaksible_id' => 'nullable|integer',
        ]);

        $transaksi->update($validated);

        return response()->json($transaksi);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return response()->json(['message' => 'Transaksi deleted']);
    }
}
