<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data['peminjaman'] = DB::table('peminjamen')
                            ->join('buku_models', 'peminjamen.id_buku_pinjam', '=', 'buku_models.id')
                            ->join('anggotas', 'peminjamen.id_anggota_pinjam', '=', 'anggotas.id')
                            ->select('peminjamen.*', 'buku_models.judul_buku', 'anggotas.nama_anggota')
                            ->get();
        return view('page.peminjaman.view-data', $data);
    }

    public function tambah()
    {
        $data['anggota'] = DB::table('anggotas')->get();
        $data['buku'] = DB::table('buku_models')->get();
        $data['temp'] = DB::table('peminjaman__temps')->get();
        return view ('page.peminjaman.tambah-data', $data);
    }

    public function storeTemp(Request $r)
    {

        $simpan = DB::table('peminjaman__temps')->insert([
            'isbn' => $r->isbn,
            'judul' => $r->judul,
            'jumlah' => $r->jumlah,
        ]);
        if($simpan == true){
            return response()->json(['success' =>1]);
        }else{
            return response()->json(['success' =>0]);
        }
    }

    public function panggilView()
    {
        $data['tmp'] = DB::table('peminjaman__temps')->get();
        return view('page.peminjaman.table',$data);
    }

    public function deleteAllTemp()
    {
        $hapus = DB::table('peminjaman__temps')->delete();
        if($hapus == true){
            return response()->json(['success' =>1]);
        }else{
            return response()->json(['success' =>0]);
        }
    }

    public function deleteItemTemp($id)
    {
        $hapus = DB::table('peminjaman__temps')->where('id',$id)->delete(); 
        if($hapus == true){
            return response()->json(['success' =>1]);
        }else{
            return response()->json(['success' =>0]);
        }
    }

    public function store(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'anggota' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id' => 'required',
            'jumlah' => 'required',
        ]);

        if($validator->fails()){
            return redirect('tambah-peminjaman')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $simpan = DB::table('peminjamen')->insert([
            'kode_pinjam' => date('YmdHis').rand(0,999),
            'tgl_pinjam' => $r->tgl_pinjam,
            'tgl_kembali' => $r->tgl_kembali,
            'id_buku_pinjam' => $r->id,
            'qty' => $r->jumlah,
            'id_anggota_pinjam' => $r->anggota, 
        ]);

        $stok = DB::table('buku_models')->where('id',$r->id)->update([
            "jumlah_buku" => DB::raw('jumlah_buku - '.$r->jumlah),
        ]);

        if($simpan == true){
            return redirect('peminjaman')->with('success','Succsess');
        } else {
            return redirect('peminjaman')->with('error','Gagal');
        }
    }

    public function cetakBuktiPeminjaman($id)
    {
        $data['peminjaman'] = DB::table('peminjamen')
                            ->join('buku_models', 'peminjamen.id_buku_pinjam', '=', 'buku_models.id')
                            ->join('anggotas', 'peminjamen.id_anggota_pinjam', '=', 'anggotas.id')
                            ->select('peminjamen.*', 'buku_models.*', 'anggotas.nama_anggota', 'anggotas.nim_anggota')
                            ->where('peminjamen.id', $id)
                            ->first();

        return view('page.laporan.cetak-bukti-pinjam', $data);
    }

    public function destroy($id)
    {
        $hapus =DB::table('peminjamen')->where('id', $id)->delete();
        
        if($hapus == true){
            return redirect('peminjaman')->with('success','Succsess');
        } else {
            return redirect('peminjaman')->with('error','Gagal');
        }
    }
   
}
