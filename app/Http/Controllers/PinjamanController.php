<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjamans = Pinjaman::with('user')->latest()->get();
        return response()->json($pinjamans);
    }

    public function show($id)
    {
        $data = Pinjaman::findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'jumlah_pinjaman'  => 'required|numeric|min:0',
            'tenor_bulan'      => 'required|integer|min:1',
            'bunga'            => 'required|numeric|min:0|max:100',
            'status'           => 'required|in:pending,disetujui,ditolak,lunas',
            'tanggal_disetujui' => 'nullable|date',
            'keterangan'       => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Pinjaman::create($request->all());
        return response()->json(['success' => 'Data pinjaman berhasil disimpan']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'jumlah_pinjaman'  => 'required|numeric|min:0',
            'tenor_bulan'      => 'required|integer|min:1',
            'bunga'            => 'required|numeric|min:0|max:100',
            'status'           => 'required|in:pending,disetujui,ditolak,lunas',
            'tanggal_disetujui' => 'nullable|date',
            'keterangan'       => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Pinjaman::findOrFail($id)->update($request->all());
        return response()->json(['success' => 'Data pinjaman berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Pinjaman::findOrFail($id)->delete();
        return response()->json(['success' => 'Data pinjaman berhasil dihapus']);
    }
}
