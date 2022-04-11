<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;


class JenisBukuController extends Controller
{
    public function index()
    {   
        $data['jenis'] = DB::table('jenis__bukus')->get();
        return view('page.jenis_buku.view-data',$data);
    }

    public function tambah()
    {
        return view('page.jenis_buku.tambah-data');
    }

    public function store(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'nama_jenis' => 'required',
        ]);

        if($validator->fails()){
            return back();
        }

        $simpan = DB::table('jenis__bukus')->insert([
            'nama_jenis' => $r->nama_jenis, 
        ]);

        if( $simpan == TRUE){
            return redirect('jenis-buku')->with('success','Data berhasil disimpan');
        } else {
            return redirect('tambah-jenis-buku')->with('error','Data gagal disimpan');
        }
    }

    public function edit($id)
    {
        $data['jenis'] = DB::table('jenis__bukus')->where('id', $id)->first();
        return view('page.jenis_buku.edit-data', $data);
    }

    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(),[
            'nama_jenis' => 'required',
        ]);

        if($validator->fails()){
            return back();
        }
        
        $update = DB::table('jenis__bukus')->where('id', $id)->update([
            'nama_jenis' => $r->nama_jenis,
        ]);

        if( $update == TRUE){
            return redirect('jenis-buku')->with('success','Data berhasil disimpan');
        } else {
            return redirect('edit-jenis-buku')->with('error','Data gagal disimpan');
        }


    }

    public function delete($id)
    {
        $hapus = DB::table('jenis__bukus')->where('id', $id)->delete();
        
        if( $hapus == TRUE){
            return back()->with('success','Data berhasil disimpan');
        } else {
            return back()->with('error','Data gagal disimpan');
        }
    }

}
