<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'mobils';

    // Tentukan kolom-kolom yang bisa diisi menggunakan mass-assignment
    protected $fillable = [
        'nama', 
        'merek', 
        'tipe', 
        'tahun_produksi', 
        'no_polisi', 
        'kapasitas_penumpang', 
        'transmisi', 
        'jenis_bahan_bakar', 
        'harga_sewa_per_hari', 
        'status_ketersediaan',
        'foto_mobil', // Mengganti 'gambar' menjadi 'foto_mobil' sesuai dengan kolom yang ada di tabel
    ];

    // Tentukan kolom-kolom yang harus di-cast
    protected $casts = [
        'harga_sewa_per_hari' => 'decimal:2', // Mengonversi 'harga_sewa_per_hari' menjadi decimal dengan 2 angka desimal
        'tahun_produksi' => 'integer', // Menyimpan tahun produksi sebagai integer
        'kapasitas_penumpang' => 'integer', // Menyimpan kapasitas penumpang sebagai integer
    ];

}
