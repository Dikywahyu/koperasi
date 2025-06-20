<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        return response()->json(Asset::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:assets,kode',
            'kategori' => 'nullable|string',
            'jumlah' => 'nullable|integer|min:1',
            'tanggal_beli' => 'nullable|date',
        ]);

        Asset::create($request->all());

        return response()->json(['message' => 'Asset berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(Asset::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = Asset::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:assets,kode,' . $id,
            'kategori' => 'nullable|string',
            'jumlah' => 'nullable|integer|min:1',
            'tanggal_beli' => 'nullable|date',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Asset berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Asset::findOrFail($id)->delete();

        return response()->json(['message' => 'Asset berhasil dihapus']);
    }
}
