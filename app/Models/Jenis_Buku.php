<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Buku extends Model
{
    use HasFactory;
    protected $table = 'jenis_bukus';
    protected $fillable = [
        'nama_jenis',
    ];
}
