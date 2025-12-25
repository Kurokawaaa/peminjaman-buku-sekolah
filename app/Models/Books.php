<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        "kode_buku",
        "nama_buku",
        "penerbit",
        "kategori",
        "penulis",
        "jumlah",
        "jumlah_dipinjam",
    ];

public function book()
    {
        return $this->belongsTo(Books::class, 'kode_buku', 'kode_buku');
    }
}

