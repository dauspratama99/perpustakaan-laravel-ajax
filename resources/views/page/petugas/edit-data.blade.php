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
                            <h5>Edit Data Petugas</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-petugas', $petugas->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama_petugas" value="{{ $petugas->nama_petugas }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan_petugas" value="{{ $petugas->jabatan_petugas }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nohp / Wa</label>
                                        <input type="number" class="form-control" name="nohp_petugas" value="{{ $petugas->nohp_petugas }}" required>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email_petugas" value="{{ $petugas->email_petugas }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea class="form-control" name="alamat_petugas" id="exampleFormControlTextarea1" rows="3" required>
                                            {{ $petugas->alamat_petugas }}
                                        </textarea>
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