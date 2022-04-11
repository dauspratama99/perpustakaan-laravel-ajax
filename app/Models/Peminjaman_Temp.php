<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_Temp extends Model
{
    use HasFactory;
    protected $table = 'peminjaman__temps';
    protected $fillable = [
        'isbn',
        'judul',
        'jumlah',
    ];
}
