<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable = [
        "nama_peminjam",
        "kelas",
        "nama_buku",
        "banyak_buku",
        "status",
        "lama_meminjam"
        ];
}
