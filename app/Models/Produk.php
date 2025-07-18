<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Properti $fillable sudah benar
    protected $fillable = [
        'nama_produk',
        'kode_produk',
        'harga',
        'stok',
        'deskripsi',
    ];
}
