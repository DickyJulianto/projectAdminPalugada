<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     * Karena form ada di halaman login, kita tampilkan view login.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.login');
    }

    /**
     * Menangani permintaan registrasi dari formulir.
     */
    public function register(Request $request): RedirectResponse
    {
        // 1. Validasi data input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // 2. Buat pengguna baru di database
        // Hash::make adalah implementasi kriptografi untuk mengamankan password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Login pengguna yang baru dibuat
        Auth::login($user);

        // 4. Arahkan ke dashboard
        return redirect('/dashboard');
    }
}
