<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Pelanggan::create($request->all());

        return response()->json(['message' => 'Pelanggan berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(Pelanggan::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = Pelanggan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Pelanggan berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();

        return response()->json(['message' => 'Pelanggan berhasil dihapus']);
    }
}
