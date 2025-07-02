<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // <-- TAMBAHKAN INI

// Rute untuk reload Captcha
Route::get('/captcha-reload', function () {
    return response()->json(['captcha'=> captcha_img('flat')]);
})->name('captcha.reload');

// Rute utama dialihkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Grup rute untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Rute untuk registrasi (BARU)
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Grup rute untuk area admin yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});