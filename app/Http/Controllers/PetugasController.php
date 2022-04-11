<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $data['petugas'] = DB::table('petugas')->get();
        return view ('page.petugas.view-data', $data);
    }

    public function tambah()
    {
        return view ('page.petugas.tambah-data');
    }

    public function store(Request $r)
    {
        $validator = validator::make($r->all(),[
            'nama_petugas' => 'required',
            'jabatan_petugas' => 'required',
            'nohp_petugas' => 'required',
            'email_petugas' => 'required',
            'alamat_petugas' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input-petugas')
                    ->withErrors($validator)
                    ->withInput();
        }


       $simpan = DB::table('petugas')->insert([
           'nama_petugas' => $r->nama_petugas,
           'jabatan_petugas' => $r->jabatan_petugas,
           'nohp_petugas' => $r->nohp_petugas,
           'email_petugas' => $r->email_petugas,
           'alamat_petugas' => $r->alamat_petugas,
       ]);

    if( $simpan == TRUE){
        return redirect('petugas')->with('success','Data berhasil disimpan');
    } else {
        return redirect('tambah-petugas')->with('error','Data gagal disimpan');
    }

    }

    public function edit($id)
    {
        $data['petugas'] = DB::table('petugas')->where('id', $id)->first();
        return view ('page.petugas.edit-data', $data);
    }

    public function update(Request $r, $id)
    {
        $validator = validator::make($r->all(),[
            'nama_petugas' => 'required',
            'jabatan_petugas' => 'required',
            'nohp_petugas' => 'required',
            'email_petugas' => 'required',
            'alamat_petugas' => 'required',
        ]);

        if($validator->fails()){
            return redirect('edit-petugas')
                    ->withErrors($validator)
                    ->withInput();
        }  

       
        {
            $update = DB::table('petugas')->where('id', $id)->update([
                'nama_petugas' => $r->nama_petugas,
                'jabatan_petugas' => $r->jabatan_petugas,
                'nohp_petugas' => $r->nohp_petugas,
                'email_petugas' => $r->email_petugas,
                'alamat_petugas' => $r->alamat_petugas,
            ]);

        }

        if($update == TRUE){
            return redirect('petugas')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('edit-petugas')->with('error', 'Data gagal diupdate');
        }
    }

    public function delete($id)
    {  
        $delete = DB::table('petugas')->where('id', $id)->delete();
      
        if($delete == TRUE){
            return redirect('petugas')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('petugas')->with('error', 'Data gagal dihapus');
        }
    }
}
