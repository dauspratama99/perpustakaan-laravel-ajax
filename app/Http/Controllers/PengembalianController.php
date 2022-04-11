<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $data['pengembalian'] = DB::table('pengembalians')
                            ->join('anggotas', 'pengembalians.id_anggota', '=', 'anggotas.id')
                            ->join('buku_models', 'pengembalians.id_buku', '=', 'buku_models.id')
                            ->select('pengembalians.*', 'anggotas.*', 'buku_models.*')
                            ->get();
        return view('page.pengembalian.view-data', $data);

    }

    public function tambah()
    {
        $data['anggota'] = DB::table('anggotas')->get();
        $data['buku'] = DB::table('buku_models')->get();
        return view('page.pengembalian.tambah-data', $data);
    }

    public function store(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'anggota' => 'required',
            'id' => 'required',
            'jumlah' => 'required',
        ]);

        if($validator->fails()){
            return redirect('tambah-pengembalian')
                    ->withErrors($validator)
                    ->withInput();
        }

        $simpan = DB::table('pengembalians')->insert([
            'id_anggota' => $r->anggota,
            'id_buku' => $r->id,
            'qty' => $r->jumlah,
            'denda' => $r->denda, 
        ]);
        
        $stok = DB::table('buku_models')->where('id',$r->id)->update([
            "jumlah_buku" => DB::raw('jumlah_buku + '.$r->jumlah),
        ]);


        if($simpan == true){
            return redirect('pengembalian')->with('success','Succsess');
        } else {
            return redirect('pengembalian')->with('error','Gagal');
        }


    }
}
