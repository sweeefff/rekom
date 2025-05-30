<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at
    public $timestamps = false;

    protected $table = 'tblproduk'; // Nama tabel

    // Kolom yang bisa diisi mass assignment
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi'
    ];
}