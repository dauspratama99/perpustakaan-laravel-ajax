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
                            <h5>Tambah Data Rak Buku</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-rak-buku', $rak->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Rak</label>
                                        <input type="text" class="form-control" name="nama_rak" placeholder="" value="{{ $rak->nama_rak }}" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kapasitas</label>
                                        <input type="number" class="form-control" name="kapasitas_rak" value="{{ $rak->kapasitas_rak }}" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Jenis Buku</label>
                                        <select name="jenis_buku_rak" id="jenis_rak_buku" class="form-control">
                                            @foreach ($jenis as $i => $data )
                                                <option value="{{ $data->id }}">{{ $data->nama_jenis }}</option>
                                            @endforeach
                                            <script>
                                                document.getElementById('jenis_rak_buku').value='{{ $rak->jenis_buku_rak }}';
                                            </script>
                                        </select>
                                    </div>
                                </div>

                            </div>
                

                            <div class="form-group">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Update</button>
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