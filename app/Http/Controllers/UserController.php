<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function getUsers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string'
        ]);

        // Generate password acak
        $randomPassword = Str::random(10);

        // Buat user dengan password terenkripsi
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($randomPassword),
        ]);

        // Simpan password asli ke relasi credential
        $user->credential()->updateOrCreate([], [
            'raw_data' => $randomPassword
        ]);

        return response()->json(['message' => 'User berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string'
        ]);

        $user->update($validated);

        return response()->json(['message' => 'User updated successfully']);
    }
}
