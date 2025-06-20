<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimpananController extends Controller
{
    public function index()
    {
        $users =  Simpanan::with('user')->latest()->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $data = Simpanan::findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'        => 'required|exists:users,id',
            'jenis_simpanan' => 'required|in:pokok,wajib,sukarela',
            'tanggal'        => 'required|date',
            'jumlah'         => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Simpanan::create($request->all());
        return response()->json(['success' => 'Data berhasil disimpan']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id'        => 'required|exists:users,id',
            'jenis_simpanan' => 'required|in:pokok,wajib,sukarela',
            'tanggal'        => 'required|date',
            'jumlah'         => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Simpanan::findOrFail($id)->update($request->all());
        return response()->json(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        Simpanan::findOrFail($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
