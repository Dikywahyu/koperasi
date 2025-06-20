<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AnggotaProfile;

class AnggotaProfileController extends Controller
{
    public function index()
    {
        $profiles = AnggotaProfile::with('user')->get();
        return response()->json($profiles);
    }

    public function show($id)
    {
        $profile = AnggotaProfile::with('user')->findOrFail($id);
        return response()->json($profile);
    }

    public function create()
    {
        $users = User::doesntHave('profile')->get(); // hanya user yang belum punya profile
        return view('anggota_profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id|unique:anggota_profiles,user_id',
            'no_anggota'    => 'required|unique:anggota_profiles,no_anggota',
            'nik'           => 'required|digits:16|unique:anggota_profiles,nik',
            'no_kk'         => 'nullable|digits:16',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required|string|max:100',
            'telepon'       => 'nullable|digits_between:10,15',
            'alamat'        => 'required|string',
            'pekerjaan'     => 'nullable|string|max:100',
            'status'        => 'required|in:aktif,nonaktif',
        ]);

        AnggotaProfile::create($request->all());

        return redirect()->route('anggota-profiles.index')->with('success', 'Profil anggota berhasil ditambahkan.');
    }

    public function edit(AnggotaProfile $anggotaProfile)
    {
        return view('anggota_profiles.edit', [
            'profile' => $anggotaProfile,
            'users'   => User::all(),
        ]);
    }

    public function update(Request $request, AnggotaProfile $anggotaProfile)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id|unique:anggota_profiles,user_id,' . $anggotaProfile->id,
            'no_anggota'    => 'required|unique:anggota_profiles,no_anggota,' . $anggotaProfile->id,
            'nik'           => 'required|digits:16|unique:anggota_profiles,nik,' . $anggotaProfile->id,
            'no_kk'         => 'nullable|digits:16',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required|string|max:100',
            'telepon'       => 'nullable|digits_between:10,15',
            'alamat'        => 'required|string',
            'pekerjaan'     => 'nullable|string|max:100',
            'status'        => 'required|in:aktif,nonaktif',
        ]);

        $anggotaProfile->update($request->all());

        return redirect()->route('anggota-profiles.index')->with('success', 'Profil anggota berhasil diperbarui.');
    }

    public function destroy(AnggotaProfile $anggotaProfile)
    {
        $anggotaProfile->delete();

        return redirect()->route('anggota-profiles.index')->with('success', 'Profil anggota berhasil dihapus.');
    }
}
