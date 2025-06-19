<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetorSimpanan;
use App\Models\User;

class SetorSimpananController extends Controller
{
    public function index()
    {
        $setorans = SetorSimpanan::with('user')->latest()->get();
        return view('simpanpinjam.setor-simpanan', compact('setorans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'tanggal_setor' => 'required|date',
        ]);

        SetorSimpanan::create($request->all());

        return redirect()->back()->with('success', 'Setoran berhasil disimpan.');
    }

    public function destroy($id)
    {
        $setoran = SetorSimpanan::findOrFail($id);
        $setoran->delete();

        return redirect()->back()->with('success', 'Setoran berhasil dihapus.');
    }
}
