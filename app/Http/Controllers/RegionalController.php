<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\Request;
use App\Imports\RegionalImport;
use Maatwebsite\Excel\Facades\Excel;

class RegionalController extends Controller
{
    public function index()
    {
        return response()->json(Regional::with('cabangs')->get());
    }

    public function show($id)
    {
        return response()->json(Regional::with('cabangs')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            // 'kode' => 'required|string|max:50|unique:regionals,kode',
        ]);

        $regional = Regional::create($data);
        return response()->json($regional, 201);
    }

    public function update(Request $request, $id)
    {
        $regional = Regional::findOrFail($id);

        $data = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'kode' => 'sometimes|string|max:50|unique:regionals,kode,' . $id,
        ]);

        $regional->update($data);
        return response()->json($regional);
    }

    public function destroy($id)
    {
        $regional = Regional::findOrFail($id);
        $regional->delete();

        return response()->json(['message' => 'Regional deleted']);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new RegionalImport, $request->file('file'));

        return response()->json(['message' => 'Import regional berhasil']);
    }
}
