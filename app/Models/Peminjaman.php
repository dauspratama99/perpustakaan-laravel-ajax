<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamen';
    protected $fillabe = [
        'kode_pinjam',
        'tgl_pinjam',
        'tgl_kembali',
        'id_buku_pinjam',
        'id_anggota_pinjam',
        'id_petugas_pinjam',
    ];
}
