<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $fillable = [
        'nama_petugas',
        'jabatan_petugas',
        'nohp_petugas',
        'email_petugas',
        'alamat_petugas',
    ];
}
