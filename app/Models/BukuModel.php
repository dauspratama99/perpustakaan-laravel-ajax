<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'buku_models';
    protected $fillable = [
        'isbn_buku',
        'judul_buku',
        'tahun_terbit',
        'penerbit_buku',
        'pengarang_buku',
        'kategori_buku_id',
        'rak_buku_id',
        'jumlah_buku',
        'gambar',
    ];
}
