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
                            <h5>Tambah Data Jenis Buku</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('simpan-jenis-buku') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Jenis Buku</label>
                                <input type="text" class="form-control" name="nama_jenis" placeholder="Jenis Buku" required>
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Batal</button>
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