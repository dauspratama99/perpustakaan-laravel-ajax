<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisBukuController;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest:login'],function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/proses_register', [LoginController::class, 'proses_register'])->name('proses_register');
    Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
});

Route::group(['middleware' => ['web','auth:login']],function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    
    //jenis buku
    Route::get('/jenis-buku', [JenisBukuController::class, 'index'])->name('jenis-buku');
    Route::get('/tambah-jenis-buku', [JenisBukuController::class, 'tambah'])->name('tambah-jenis-buku');
    Route::post('/simpan-jenis-buku', [JenisBukuController::class, 'store'])->name('simpan-jenis-buku');
    Route::get('/edit-jenis-buku/{id}', [JenisBukuController::class, 'edit'])->name('edit-jenis-buku');
    Route::post('/update-jenis-buku/{id}', [JenisBukuController::class, 'update'])->name('update-jenis-buku');
    Route::get('/delete-jenis-buku/{id}', [JenisBukuController::class, 'delete'])->name('hapus-jenis-buku');
    
    //rak buku
    Route::get('/rak-buku', [RakBukuController::class, 'index'])->name('rak-buku');
    Route::get('/tambah-rak-buku', [RakBukuController::class, 'tambah'])->name('tambah-rak-buku');
    Route::post('/simpan-rak-buku', [RakBukuController::class, 'store'])->name('simpan-rak-buku');
    Route::get('/edit-rak-buku/{id}', [RakBukuController::class, 'edit'])->name('edit-rak-buku');
    Route::post('/update-rak-buku/{id}', [RakBukuController::class, 'update'])->name('update-rak-buku');
    Route::get('/delete-rak-buku/{id}', [RakBukuController::class, 'delete'])->name('hapus-rak-buku');

    //buku
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/tambah-buku', [BukuController::class, 'tambah'])->name('tambah-buku');
    Route::post('/simpan-buku', [BukuController::class, 'store'])->name('simpan-buku');
    Route::get('/edit-buku/{id}', [BukuController::class, 'edit'])->name('edit-buku');
    Route::post('/update-buku/{id}', [BukuController::class, 'update'])->name('update-buku');
    Route::get('/delete-buku/{id}', [BukuController::class, 'delete'])->name('hapus-buku');

    //petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::get('/tambah-petugas', [PetugasController::class, 'tambah'])->name('tambah-petugas');
    Route::post('/simpan-petugas', [PetugasController::class, 'store'])->name('simpan-petugas');
    Route::get('/edit-petugas/{id}', [PetugasController::class, 'edit'])->name('edit-petugas');
    Route::post('/update-petugas/{id}', [PetugasController::class, 'update'])->name('update-petugas');
    Route::get('/delete-petugas/{id}', [PetugasController::class, 'delete'])->name('hapus-petugas');

    //anggota
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::get('/tambah-anggota', [AnggotaController::class, 'tambah'])->name('tambah-anggota');
    Route::post('/simpan-anggota', [AnggotaController::class, 'store'])->name('simpan-anggota');
    Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
    Route::post('/update-anggota/{id}', [AnggotaController::class, 'update'])->name('update-anggota');
    Route::get('/delete-anggota/{id}', [AnggotaController::class, 'delete'])->name('hapus-anggota');

    //peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/tambah-peminjaman', [PeminjamanController::class, 'tambah'])->name('tambah-peminjaman');
    Route::post('/simpan-peminjaman', [PeminjamanController::class, 'store'])->name('simpan-peminjaman');
    Route::get('/cetak-bukti-peminjaman/{id}', [PeminjamanController::class, 'cetakBuktiPeminjaman'])->name('cetak-bukti-peminjaman');
    Route::get('/hapus-peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('hapus-peminjaman');
    
    //pengembalian 
    Route::get('/pengembalian',[PengembalianController::class, 'index'])->name('pengembalian');
    Route::get('/tambah-pengembalian',[PengembalianController::class, 'tambah'])->name('tambah-pengembalian');
    Route::post('/simpan-pengembalian',[PengembalianController::class, 'store'])->name('simpan-pengembalian');
    

    //temporary
    Route::post('/simpan-temp', [PeminjamanController::class, 'storeTemp'])->name('simpan-temp');
    Route::get('/panggil-temp', [PeminjamanController::class, 'panggilView'])->name('panggil-temp');
    Route::post('/hapus-temp-all', [PeminjamanController::class, 'deleteAllTemp'])->name('hapus-temp-all');
    Route::get('/delete-temp-item/{id}', [PeminjamanController::class, 'deleteItemTemp'])->name('hapus-temp-item');

    //laporan
    Route::get('/laporan-per-jenis', [LaporanController::class, 'perjenis'])->name('laporan-per-jenis');
    Route::get('/laporan-per-rak', [LaporanController::class, 'perrak'])->name('laporan-per-rak');
    Route::get('/laporan-buku', [LaporanController::class, 'buku'])->name('laporan-buku');
    Route::get('/laporan-petugas', [LaporanController::class, 'petugas'])->name('laporan-petugas');
    Route::get('/laporan-anggota', [LaporanController::class, 'anggota'])->name('laporan-anggota');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});