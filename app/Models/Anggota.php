<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $fillable = [
        'nim_anggota',
        'nama_anggota',
        'jk_anggota',
        'nohp_anggota',
        'email_anggota',
        'alamat_anggota',
    ];
}
