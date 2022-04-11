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
                            <h5>Edit Data Buku</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-buku', $buku->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ISBN</label>
                                        <input type="text" class="form-control" readonly name="isbn_buku" value="{{ $buku->isbn_buku }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" value="{{ $buku->judul_buku }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit_buku" value="{{ $buku->penerbit_buku }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang_buku" value="{{ $buku->pengarang_buku }}" required>
                                    </div>
                                
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Kategori Buku</label>
                                        <select name="kategori_buku_id" id="kategori_buku_id" class="form-control">
                                            <option value="" selected disabled>- Pilih Kategori Buku -</option>
                                            @foreach ($jenis as $i => $data )
                                                <option value="{{ $data->id }}">{{ $data->nama_jenis }}</option>
                                            @endforeach
                                            <script>
                                                document.getElementById('kategori_buku_id').value="{{ $buku->kategori_buku_id }}"
                                            </script>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Rak Buku</label>
                                        <select name="rak_buku_id" id="rak_buku_id" class="form-control">
                                            <option value="" selected disabled>- Pilih Rak Buku -</option>
                                            @foreach ($rak as $i => $data )
                                                <option value="{{ $data->id }}">{{ $data->nama_rak }}</option>
                                            @endforeach
                                            <script>
                                                document.getElementById('rak_buku_id').value="{{ $buku->rak_buku_id }}"
                                            </script>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah_buku" value="{{ $buku->jumlah_buku }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Foto Lama</label><br>
                                        <img src="{{ asset('gambar/'. $buku->gambar) }}" alt="Image" width="25px">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Foto Baru</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-success">Update</button>
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