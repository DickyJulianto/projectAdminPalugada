<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; // Panggil LoginController

// Rute utama dialihkan ke login jika belum terautentikasi
Route::get('/', function () {
    return redirect()->route('login');
});

// Grup rute untuk autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Grup rute untuk area admin yang dilindungi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Tambahkan rute dashboard lainnya di sini
});
