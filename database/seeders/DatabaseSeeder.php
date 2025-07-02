<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <-- Pastikan use Hash ditambahkan

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Admin User
        User::create([
            'name' => 'Admin Palugada',
            'email' => 'admin@palugada.com',
            'password' => Hash::make('password123'), // Password di-hash
            'role' => 1, // 1 untuk Admin
            'status' => 1, // 1 untuk Aktif
        ]);

        // Membuat Regular User
        User::create([
            'name' => 'Dicky Julianto',
            'email' => 'dicky@palugada.com',
            'password' => Hash::make('password123'),
            'role' => 0, // 0 untuk User biasa
            'status' => 1, // 1 untuk Aktif
        ]);
    }
}
