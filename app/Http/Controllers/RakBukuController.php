<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class RakBukuController extends Controller
{
    public function index()
    {   
        $data['rak'] = DB::table('raks')
                      ->join('jenis__bukus', 'raks.jenis_buku_rak', '=', 'jenis__bukus.id')
                      ->select('raks.*', 'jenis__bukus.nama_jenis') 
                      ->get();
        return view('page.rak_buku.view-data',$data);
    }

    public function tambah()
    {   
        $data['jenis'] = DB::table('jenis__bukus')->get();
        return view('page.rak_buku.tambah-data', $data);
    }

    public function store(Request $r)
    {
       
        $validator = Validator::make($r->all(),[
            'nama_rak' => 'required',
            'kapasitas_rak' => 'required',
            'jenis_buku_rak' => 'required',
        ]);

        if($validator->fails()){
            return back();
        }

        $simpan = DB::table('raks')->insert([
            'nama_rak' => $r->nama_rak, 
            'kapasitas_rak' => $r->kapasitas_rak, 
            'jenis_buku_rak' => $r->jenis_buku_rak, 
        ]);

        if( $simpan == TRUE){
            return redirect('rak-buku')->with('success','Data berhasil disimpan');
        } else {
            return redirect('tambah-rak-buku')->with('error','Data gagal disimpan');
        }
    }

    public function edit($id)
    {
        $data['jenis'] = DB::table('jenis__bukus')->get();
        $data['rak'] = DB::table('raks')->where('id', $id)->first();
        return view('page.rak_buku.edit-data', $data);
    }

    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(),[
            'nama_rak' => 'required',
            'kapasitas_rak' => 'required',
            'jenis_buku_rak' => 'required',
        ]);

        if($validator->fails()){
            return back();
        }
        
        $update = DB::table('raks')->where('id', $id)->update([
            'nama_rak' => $r->nama_rak,
            'kapasitas_rak' => $r->kapasitas_rak,
            'jenis_buku_rak' => $r->jenis_buku_rak,
        ]);

        if( $update == TRUE){
            return redirect('rak-buku')->with('success','Data berhasil disimpan');
        } else {
            return redirect('edit-rak-buku')->with('error','Data gagal disimpan');
        }


    }

    public function delete($id)
    {
        $hapus = DB::table('raks')->where('id', $id)->delete();
        
        if( $hapus == TRUE){
            return back()->with('success','Data berhasil disimpan');
        } else {
            return back()->with('error','Data gagal disimpan');
        }
    }
}
