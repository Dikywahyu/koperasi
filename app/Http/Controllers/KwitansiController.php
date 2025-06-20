<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kwitansi;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{

    public function prosesDonasiAktif()
    {
        $donasis = Donasi::where('status', 'aktif')
            ->doesntHave('kwitansi') // hanya donasi yang belum punya kwitansi
            ->get();

        $jumlah = 0;

        foreach ($donasis as $donasi) {
            Kwitansi::create([
                'donasi_id' => $donasi->id,
                'total' => $donasi->nominal,
                'komisi_zisco' => 0, // bisa Anda hitung berdasarkan aturan
                'bulan_donasi' => $donasi->bulan_donasi,
                'nomor_transaksi' => 'KW' . Carbon::parse($donasi->bulan_donasi)->format('Ym') . 'D' . str_pad($donasi->id, 4, '0', STR_PAD_LEFT) . strtoupper(Str::random(6)),
                'dicetak' => false,
            ]);
            $jumlah++;
        }

        return response()->json([
            'message' => "$jumlah kwitansi berhasil dibuat dari donasi aktif.",
        ]);
    }

    public function index()
    {
        return response()->json(Kwitansi::with([
            'donasi.donatur',
            'donasi.zisco',
            'donasi.jenisDonasi'
        ])->get());
    }

    public function show($id)
    {
        return response()->json(Kwitansi::with([
            'donasi.donatur',
            'donasi.zisco',
            'donasi.jenisDonasi'
        ])->findOrFail($id));
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
