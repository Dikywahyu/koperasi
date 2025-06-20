<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::with(['user', 'instansi'])->latest()->get();
        return response()->json($donaturs);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'instansi_id' => 'nullable|exists:instansis,id',
            'nama' => 'required|string|max:255',
            'kode_donatur' => 'required|string|max:100|unique:donaturs,kode_donatur',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
        ]);

        $donatur = Donatur::create($validated);

        return response()->json($donatur, 201);
    }

    public function show($id)
    {
        $donatur = Donatur::with(['user', 'instansi'])->findOrFail($id);
        return response()->json($donatur);
    }

    public function update(Request $request, $id)
    {
        $donatur = Donatur::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'instansi_id' => 'nullable|exists:instansis,id',
            'nama' => 'required|string|max:255',
            'kode_donatur' => 'required|string|max:100|unique:donaturs,kode_donatur,' . $id,
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
        ]);

        $donatur->update($validated);

        return response()->json($donatur);
    }

    public function destroy($id)
    {
        $donatur = Donatur::findOrFail($id);
        $donatur->delete();

        return response()->json(['message' => 'Donatur deleted']);
    }
}
