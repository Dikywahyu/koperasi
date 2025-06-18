<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Ambil data lokasi dari IP (optional)
            $ip = $request->ip();
            $location = null;

            try {
                $response = Http::get("http://ip-api.com/json/{$ip}");
                if ($response->ok()) {
                    $data = $response->json();
                    $location = "{$data['city']}, {$data['regionName']}, {$data['country']}";
                }
            } catch (\Exception $e) {
                $location = null; // jika gagal ambil lokasi
            }

            // Simpan log login
            LoginLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $ip,
                'ket' => "In User",
                'location' => $location,
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json(['message' => 'Login berhasil.']);
        }

        return response()->json(['message' => 'Email atau password salah.'], 401);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            // Simpan log logout
            // Ambil data lokasi dari IP (optional)
            $ip = $request->ip();
            $location = null;

            try {
                $response = Http::get("http://ip-api.com/json/{$ip}");
                if ($response->ok()) {
                    $data = $response->json();
                    $location = "{$data['city']}, {$data['regionName']}, {$data['country']}";
                }
            } catch (\Exception $e) {
                $location = null; // jika gagal ambil lokasi
            }

            LoginLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'ket' => "Out",
                'location' => $location, // Bisa isi null atau ambil ulang lokasi
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
