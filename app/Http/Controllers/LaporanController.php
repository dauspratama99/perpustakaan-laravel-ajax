<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    public function perjenis()
    {   
        $data['jenis'] = DB::table('jenis__bukus')->get();
        return view ('page.laporan.lap_jenis', $data);
    }

    public function perrak()
    {   
        $data['rak'] = DB::table('raks')
                        ->join('jenis__bukus', 'raks.jenis_buku_rak', '=', 'jenis__bukus.id')
                        ->get();
        return view ('page.laporan.lap_rak', $data);
    }

    public function buku()
    {   
        $data['buku'] = DB::table('buku_models')
                        ->join('jenis__bukus', 'buku_models.kategori_buku_id', '=', 'jenis__bukus.id')
                        ->join('raks', 'buku_models.rak_buku_id', '=', 'raks.id')
                        ->select('buku_models.*', 'jenis__bukus.nama_jenis', 'raks.nama_rak')
                        ->get();
        return view ('page.laporan.lap_buku', $data);
    }

    public function petugas()
    {
        $data['petugas'] = DB::table('petugas')->get();
        return view ('page.laporan.lap_petugas', $data);
    }

    public function anggota()
    {
        $data['anggota'] = DB::table('anggotas')->get();
        return view ('page.laporan.lap_anggota', $data);
    }

}
