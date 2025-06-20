<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    public function index()
    {
        return response()->json(Pemasok::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Pemasok::create($request->all());

        return response()->json(['message' => 'Pemasok berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(Pemasok::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = Pemasok::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Pemasok berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Pemasok::findOrFail($id)->delete();

        return response()->json(['message' => 'Pemasok berhasil dihapus']);
    }
}
