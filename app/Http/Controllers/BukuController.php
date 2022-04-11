<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        $data['buku'] = DB::table('buku_models')
                        ->join('jenis__bukus', 'buku_models.kategori_buku_id', '=', 'jenis__bukus.id')
                        ->join('raks', 'buku_models.rak_buku_id', '=', 'raks.id')
                        ->select('buku_models.*', 'jenis__bukus.nama_jenis', 'raks.nama_rak')
                        ->get();
        return view ('page.buku.view-data', $data);
    }

    public function tambah()
    {
        $data['jenis'] = DB::table('jenis__bukus')->get();
        $data['rak'] = DB::table('raks')->get();
        return view ('page.buku.tambah-data', $data);
    }

    public function store(Request $r)
    {
        $validator = validator::make($r->all(),[
            'isbn_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penerbit_buku' => 'required',
            'pengarang_buku' => 'required',
            'kategori_buku_id' => 'required',
            'rak_buku_id' => 'required',
            'jumlah_buku' => 'required',
            'gambar' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input-buku')
                    ->withErrors($validator)
                    ->withInput();
        }

       // input gambar
       $file       = $r->file('gambar');
       $fileName   = $file->getClientOriginalName();
       $extension  = $file->getClientOriginalExtension();
       $file->move('gambar/', $fileName);

       $simpan = DB::table('buku_models')->insert([
           'isbn_buku' => $r->isbn_buku,
           'judul_buku' => $r->judul_buku,
           'tahun_terbit' => $r->tahun_terbit,
           'penerbit_buku' => $r->penerbit_buku,
           'pengarang_buku' => $r->pengarang_buku,
           'kategori_buku_id' => $r->kategori_buku_id,
           'rak_buku_id' => $r->rak_buku_id,
           'jumlah_buku' => $r->jumlah_buku,
           'gambar' => $fileName,
       ]);

    if( $simpan == TRUE){
        return redirect('buku')->with('success','Data berhasil disimpan');
    } else {
        return redirect('tambah-buku')->with('error','Data gagal disimpan');
    }

    }

    public function edit($id)
    {
        $data['jenis'] = DB::table('jenis__bukus')->get();
        $data['rak'] = DB::table('raks')->get();
        $data['buku'] = DB::table('buku_models')->where('id', $id)->first();
        return view ('page.buku.edit-data', $data);
    }

    public function update(Request $r, $id)
    {
        $validator = validator::make($r->all(),[
            'isbn_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penerbit_buku' => 'required',
            'pengarang_buku' => 'required',
            'kategori_buku_id' => 'required',
            'rak_buku_id' => 'required',
            'jumlah_buku' => 'required',
          
        ]);

        if($validator->fails()){
            return redirect('edit-buku')
                    ->withErrors($validator)
                    ->withInput();
        }  

        if($r->file('gambar') == NULL )
        {
            $update = DB::table('buku_models')->where('id', $id)->update([
                'isbn_buku' => $r->isbn_buku,
                'judul_buku' => $r->judul_buku,
                'tahun_terbit' => $r->tahun_terbit,
                'penerbit_buku' => $r->penerbit_buku,
                'pengarang_buku' => $r->pengarang_buku,
                'kategori_buku_id' => $r->kategori_buku_id,
                'rak_buku_id' => $r->rak_buku_id,
                'jumlah_buku' => $r->jumlah_buku,
            ]);
        } else {

            $fotoLama = DB::table('buku_models')->where('id', $id)->first();
            if($fotoLama->gambar != NULL)
            {
                unlink('gambar/'. $fotoLama->gambar);
            }

            // input gambar
            $file       = $r->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $extension  = $file->getClientOriginalExtension();
            $file->move('gambar/', $fileName);

            $update = DB::table('buku_models')->where('id', $id)->update([
                'isbn_buku' => $r->isbn_buku,
                'judul_buku' => $r->judul_buku,
                'tahun_terbit' => $r->tahun_terbit,
                'penerbit_buku' => $r->penerbit_buku,
                'pengarang_buku' => $r->pengarang_buku,
                'kategori_buku_id' => $r->kategori_buku_id,
                'rak_buku_id' => $r->rak_buku_id,
                'jumlah_buku' => $r->jumlah_buku,
                'gambar' => $fileName, 
            ]);

        }

        if($update == TRUE){
            return redirect('buku')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('edit-buku')->with('error', 'Data gagal diupdate');
        }
    }

    public function delete($id)
    {
        $fotoLama = DB::table('buku_models')->where('id', $id)->first();
        if($fotoLama->gambar != NULL)
        {
            unlink('gambar/'. $fotoLama->gambar);
            $delete = DB::table('buku_models')->where('id', $id)->delete();

        } else {
            
            $delete = DB::table('buku_models')->where('id', $id)->delete();
        }

        if($delete == TRUE){
            return redirect('buku')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('buku')->with('error', 'Data gagal dihapus');
        }
    }

}
