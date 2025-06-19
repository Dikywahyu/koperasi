<?php

namespace App\Http\Controllers;

use App\Models\PenarikanSimpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanSimpananController extends Controller
{
    public function index()
    {
        $penarikan = PenarikanSimpanan::with('user')->latest()->get();
        return response()->json($penarikan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'tanggal_penarikan' => 'nullable|date',
        ]);

        $penarikan = PenarikanSimpanan::create([
            'user_id' => Auth::id(),
            'jumlah' => $validated['jumlah'],
            'keterangan' => $validated['keterangan'] ?? null,
            'tanggal_penarikan' => $validated['tanggal_penarikan'] ?? now(),
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Pengajuan penarikan berhasil', 'data' => $penarikan]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $penarikan = PenarikanSimpanan::findOrFail($id);
        $penarikan->update(['status' => $request->status]);

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $penarikan = PenarikanSimpanan::findOrFail($id);
        $penarikan->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
