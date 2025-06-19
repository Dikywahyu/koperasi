<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['permission', 'parent'])->get();
        return response()->json($menus); // Jika ingin data JSON untuk DataTables atau AJAX
        // atau: return view('menus.index', compact('menus')); jika ingin tampilan HTML
    }


    public function show($id)
    {
        $permission = Menu::findOrFail($id);
        return response()->json($permission);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'route' => 'nullable|string',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:menus,id',
            'order' => 'nullable|integer',
            'permission_name' => 'nullable|string',
        ]);

        $menu = Menu::create($request->all());

        return response()->json(['message' => 'Menu created', 'data' => $menu]);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'route' => 'nullable|string',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:menus,id',
            'order' => 'nullable|integer',
            'permission_name' => 'nullable|string',
        ]);

        $menu->update($request->all());

        return response()->json(['message' => 'Menu updated']);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json(['message' => 'Menu deleted']);
    }
}
