<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Angsuran;
use Illuminate\Support\Facades\Validator;

class AngsuranController extends Controller
{
    //
    public function index()
    {
        $angsuran = Angsuran::with('pinjaman.user')->latest()->get();
        return response()->json($angsuran);
    }

    public function show($id)
    {
        $data = Angsuran::with('pinjaman.user')->findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pinjaman_id'    => 'required|exists:pinjamans,id',
            'tanggal_bayar'  => 'required|date',
            'jumlah_bayar'   => 'required|numeric|min:0',
            'bunga'          => 'nullable|numeric|min:0',
            'keterangan'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Angsuran::create($request->all());
        return response()->json(['success' => 'Data angsuran berhasil disimpan']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pinjaman_id'    => 'required|exists:pinjamans,id',
            'tanggal_bayar'  => 'required|date',
            'jumlah_bayar'   => 'required|numeric|min:0',
            'bunga'          => 'nullable|numeric|min:0',
            'keterangan'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Angsuran::findOrFail($id)->update($request->all());
        return response()->json(['success' => 'Data angsuran berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Angsuran::findOrFail($id)->delete();
        return response()->json(['success' => 'Data angsuran berhasil dihapus']);
    }
}
