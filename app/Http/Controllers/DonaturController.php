<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        return response()->json(Donatur::with(['user', 'instansi', 'zisco', 'donasis'])->get());
    }

    public function show($id)
    {
        return response()->json(Donatur::with(['user', 'instansi', 'zisco', 'donasis'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'instansi_id' => 'nullable|exists:instansis,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
        ]);

        $donatur = Donatur::create($data);
        return response()->json($donatur, 201);
    }

    public function update(Request $request, $id)
    {
        $donatur = Donatur::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'instansi_id' => 'nullable|exists:instansis,id',
            'zisco_id' => 'nullable|exists:ziscos,id',
            'nama' => 'sometimes|string|max:255',
            'kode_donatur' => 'sometimes|string|unique:donaturs,kode_donatur,' . $id,
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
        ]);

        $donatur->update($data);
        return response()->json($donatur);
    }

    public function destroy($id)
    {
        $donatur = Donatur::findOrFail($id);
        $donatur->delete();

        return response()->json(['message' => 'Donatur deleted']);
    }
}
