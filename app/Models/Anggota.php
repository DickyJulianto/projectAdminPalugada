<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Baris ini menandakan bahwa model tidak menggunakan timestamp (created_at, updated_at)
    // Jika tabel Anda memilikinya, Anda bisa menghapus baris ini atau mengubahnya menjadi 'true'
    public $timestamps = true;

    // Menghubungkan model dengan nama tabel yang spesifik di database
    protected $table = "anggota";

    // Menentukan kolom mana saja yang tidak boleh diisi secara massal.
    // '$guarded = []' berarti semua kolom boleh diisi.
    protected $guarded = ['id'];
}
