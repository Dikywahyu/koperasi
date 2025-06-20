<?php

namespace App\Http\Controllers;

use App\Models\Zisco;
use Illuminate\Http\Request;

class ZiscoController extends Controller
{
    public function index()
    {
        $ziscos = Zisco::with('user')->latest()->get();
        return response()->json($ziscos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $zisco = Zisco::create($validated);

        return response()->json($zisco, 201);
    }

    public function show($id)
    {
        $zisco = Zisco::with('user')->findOrFail($id);
        return response()->json($zisco);
    }

    public function update(Request $request, $id)
    {
        $zisco = Zisco::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $zisco->update($validated);

        return response()->json($zisco);
    }

    public function destroy($id)
    {
        $zisco = Zisco::findOrFail($id);
        $zisco->delete();

        return response()->json(['message' => 'Zisco deleted']);
    }
}
