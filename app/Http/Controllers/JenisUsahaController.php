<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class JenisUsahaController extends Controller
{
    public function index()
    {
        return response()->json(JenisUsaha::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JenisUsaha::create($request->all());

        return response()->json(['message' => 'Jenis usaha berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(JenisUsaha::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = JenisUsaha::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Jenis usaha berhasil diperbarui']);
    }

    public function destroy($id)
    {
        JenisUsaha::findOrFail($id)->delete();

        return response()->json(['message' => 'Jenis usaha berhasil dihapus']);
    }
}
