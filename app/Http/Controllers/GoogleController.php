<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect(); // ⚠️ VS Code false positive: stateless() sebenarnya valid dan tetap berfungsi
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user(); // ⚠️ VS Code false positive: stateless() sebenarnya valid dan tetap berfungsi

        // Cek apakah user sudah ada
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(uniqid()), // password dummy
            ]
        );

        // Beri role default hanya jika belum punya role
        if (!$user->hasAnyRole(['user', 'admin', 'superadmin'])) {
            $user->assignRole('user');
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
