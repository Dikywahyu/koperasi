<?php

namespace App\Http\Controllers;

use App\Models\TipeDokumen;
use Illuminate\Http\Request;

class TipeDokumenController extends Controller
{
    public function index()
    {
        return response()->json(TipeDokumen::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:tipe_dokumens,kode',
            'deskripsi' => 'nullable|string',
        ]);

        TipeDokumen::create($request->all());

        return response()->json(['message' => 'Tipe dokumen berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(TipeDokumen::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = TipeDokumen::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:tipe_dokumens,kode,' . $id,
            'deskripsi' => 'nullable|string',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Tipe dokumen berhasil diperbarui']);
    }

    public function destroy($id)
    {
        TipeDokumen::findOrFail($id)->delete();

        return response()->json(['message' => 'Tipe dokumen berhasil dihapus']);
    }
}
