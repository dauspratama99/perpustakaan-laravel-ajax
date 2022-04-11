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
                            <h5>Edit Data Anggota</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-anggota', $anggota->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Nim</label>
                                        <input type="number" class="form-control" name="nim_anggota" readonly value="{{ $anggota->nim_anggota }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="form-control" name="jk_anggota" id="jk_anggota">
                                            <option value="" selected disabled>- Pilih -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <script>
                                            document.getElementById('jk_anggota').value="{{ $anggota->jk_anggota }}";
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nohp / Wa</label>
                                        <input type="number" class="form-control" name="nohp_anggota" value="{{ $anggota->nohp_anggota }}" required>
                                    </div>
                                
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email_anggota" value="{{ $anggota->email_anggota }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea class="form-control" name="alamat_anggota" id="exampleFormControlTextarea1" rows="3" required>
                                            {{ $anggota->alamat_anggota }}
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