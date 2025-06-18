<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        // Buat password acak 12 karakter
        $randomPassword = Str::random(12);

        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            [
                'email' => $googleUser->getEmail()
            ],
            [
                'name' => $googleUser->getName(),
                'role' => 'User',
                'password' => bcrypt($randomPassword)
            ]
        );

        // Simpan atau update password asli
        $user->credential()->updateOrCreate([], [
            'raw_data' => $randomPassword
        ]);

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

        Auth::login($user);

        return redirect('/dashboard');
    }
}
