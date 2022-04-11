<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        $data['anggota'] = DB::table('anggotas')->get();
        return view ('page.anggota.view-data', $data);
    }

    public function tambah()
    {
        return view ('page.anggota.tambah-data');
    }

    public function store(Request $r)
    {
        $validator = validator::make($r->all(),[
            'nim_anggota' => 'required',
            'nama_anggota' => 'required',
            'jk_anggota' => 'required',
            'nohp_anggota' => 'required',
            'email_anggota' => 'required',
            'alamat_anggota' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input-anggota')
                    ->withErrors($validator)
                    ->withInput();
        }


       $simpan = DB::table('anggotas')->insert([
           'nim_anggota' => $r->nim_anggota,
           'nama_anggota' => $r->nama_anggota,
           'jk_anggota' => $r->jk_anggota,
           'nohp_anggota' => $r->nohp_anggota,
           'email_anggota' => $r->email_anggota,
           'alamat_anggota' => $r->alamat_anggota,
       ]);

    if( $simpan == TRUE){
        return redirect('anggota')->with('success','Data berhasil disimpan');
    } else {
        return redirect('tambah-anggota')->with('error','Data gagal disimpan');
    }

    }

    public function edit($id)
    {
        $data['anggota'] = DB::table('anggotas')->where('id', $id)->first();
        return view ('page.anggota.edit-data', $data);
    }

    public function update(Request $r, $id)
    {
        $validator = validator::make($r->all(),[
            'nim_anggota' => 'required',
            'nama_anggota' => 'required',
            'jk_anggota' => 'required',
            'nohp_anggota' => 'required',
            'email_anggota' => 'required',
            'alamat_anggota' => 'required',
        ]);

        if($validator->fails()){
            return redirect('edit-anggota')
                    ->withErrors($validator)
                    ->withInput();
        }  

       
        
            $update = DB::table('anggotas')->where('id', $id)->update([
                'nim_anggota' => $r->nim_anggota,
                'nama_anggota' => $r->nama_anggota,
                'jk_anggota' => $r->jk_anggota,
                'nohp_anggota' => $r->nohp_anggota,
                'email_anggota' => $r->email_anggota,
                'alamat_anggota' => $r->alamat_anggota,
            ]);

     

        if($update == TRUE){
            return redirect('anggota')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('edit-anggota')->with('error', 'Data gagal diupdate');
        }
    }

    public function delete($id)
    {  
        $delete = DB::table('anggotas')->where('id', $id)->delete();
      
        if($delete == TRUE){
            return redirect('anggota')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('anggota')->with('error', 'Data gagal dihapus');
        }
    }
}
