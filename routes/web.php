<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukController;

// Rute untuk reload Captcha (jika masih digunakan)
Route::get('/captcha-reload', function () {
    return response()->json(['captcha' => captcha_img('flat')]);
})->name('captcha.reload');

// Rute utama dialihkan ke login
Route::get('/', function () {
    // Jika pengguna sudah login, arahkan ke dashboard. Jika belum, ke login.
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Membuat semua rute otentikasi (login, register, logout, reset password, verifikasi email)
Auth::routes(['verify' => true]);

// Grup rute untuk area yang memerlukan login DAN verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // Rute dashboard utama
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Pastikan view ini ada
    })->name('dashboard');

    // Resource Route untuk CRUD Produk
    Route::resource('produk', ProdukController::class);
});

// Anda dapat menghapus rute manual untuk login/register/logout
// karena sudah ditangani oleh Auth::routes()

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
