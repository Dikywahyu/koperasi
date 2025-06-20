<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $transaksis = Transaksi::with('user')->latest()->get();
        return response()->json($transaksis);
    }

    public function show($id)
    {
        $data = Transaksi::with('user')->findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'      => 'required|exists:users,id',
            'tanggal'      => 'required|date',
            'jenis'        => 'required|in:masuk,keluar',
            'kategori'     => 'required|string|max:100',
            'jumlah'       => 'required|numeric|min:0',
            'keterangan'   => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Transaksi::create($request->all());
        return response()->json(['success' => 'Data transaksi berhasil disimpan']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id'      => 'required|exists:users,id',
            'tanggal'      => 'required|date',
            'jenis'        => 'required|in:masuk,keluar',
            'kategori'     => 'required|string|max:100',
            'jumlah'       => 'required|numeric|min:0',
            'keterangan'   => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Transaksi::findOrFail($id)->update($request->all());
        return response()->json(['success' => 'Data transaksi berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return response()->json(['success' => 'Data transaksi berhasil dihapus']);
    }
}
