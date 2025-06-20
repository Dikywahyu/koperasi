<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        return response()->json(Perusahaan::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        Perusahaan::create($request->all());

        return response()->json(['message' => 'Perusahaan berhasil ditambahkan']);
    }

    public function show($id)
    {
        return response()->json(Perusahaan::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $data = Perusahaan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        $data->update($request->all());

        return response()->json(['message' => 'Perusahaan berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Perusahaan::findOrFail($id)->delete();

        return response()->json(['message' => 'Perusahaan berhasil dihapus']);
    }
}
