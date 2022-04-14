@extends('layout.index')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row ">
        
      </div>
    </div>
  </div>

<div class="container-fluid">
    
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h5>Tambah Data Buku</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('simpan-buku') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ISBN</label>
                                        <input type="text" class="form-control" name="isbn_buku" placeholder="Isbn" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" placeholder="Tahun" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit_buku" placeholder="Penerbit" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang_buku" placeholder="Pengarang" required>
                                    </div>
                                
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Rak Buku</label>
                                        <select name="rak_buku_id" id="" class="form-control">
                                            <option value="" selected disabled>- Pilih Rak Buku -</option>
                                            @foreach ($rak as $i => $data )
                                                <option value="{{ $data->id }}">{{ $data->nama_rak }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah_buku" placeholder="Jumlah" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
              </div>
          </div>
      </div>
  </div>

  @push('js')
  <script>
      $(document).ready(function() {
          $('#table').DataTable();
      });
  </script>
  @endpush
  



@endsection