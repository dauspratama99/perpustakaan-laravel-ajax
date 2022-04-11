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
                        <h5>Pengembalian Buku</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan-pengembalian') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5" style="background-color:cadetblue; border-radius:10px;">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="">Pilih Anggota</label>
                                    <select class="js-example-basic-single form-control mt-3" name="anggota" style="" height="30px">
                                        <option value="" selected disabled>- Pilih -</option>
                                        @foreach ($anggota as $i => $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_anggota }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Isbn Buku</label>
                                    <input type="hidden" id="id" class="form-control" name="id" required>
                                    <input type="text" id="isbn" class="form-control" name="isbn" required>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="" style="visibility: hidden;">Isbn Buku</label>
                                    <button type="button" class="btn btn-warning btn-sm align-items-center"
                                        data-toggle="modal" data-target="#modalBuku"><i class="fas fa-search"></i>
                                        Cari</button>
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" readonly id="judul" class="form-control" name="judul">
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Denda (Rp.)</label>
                                    <input type="number" class="form-control" value="0" name="denda" id="denda">
                                   
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="" style="visibility: hidden;">Kode</label>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                        Proses</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm" id="confirmasiItem" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4>Yakin Hapus Data Ini ?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger btn-sm" name="hapusItem" id="hapusItem">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-sm" id="confirmasiAll" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h4>Yakin Hapus Semua Data ?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger btn-sm" name="hapusAllOk" id="hapusAllOk" >Hapus</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade bd-example-modal-lg" id="modalBuku" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <th>No</th>
                        <th>Isbn</th>
                        <th>Judul</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @foreach ($buku as $i => $data )
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $data->isbn_buku }}</td>
                            <td>{{ $data->judul_buku }}</td>
                            <td>{{ $data->tahun_terbit }}</td>
                            <td>{{ $data->jumlah_buku }}</td>
                            <td>
                            <button class="btn btn-sm btn-warning" id="pilih"
                                        data-id="{{ $data->id }}"
                                        data-isbn="{{ $data->isbn_buku }}"
                                        data-judul="{{ $data->judul_buku }}">
                                        <i class="fas fa-mouse-pointer"></i>
                            </button>        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@push('js')

<script>
    $(document).ready(function () {
        load()
        $('#table').DataTable();
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#pilih', function() {
            var item_id = $(this).data('id');
            var item_isbn = $(this).data('isbn');
            var item_judul = $(this).data('judul');
            $('#id').val(item_id);
            $('#isbn').val(item_isbn);
            $('#judul').val(item_judul);
            $('#modalBuku').modal('hide');
        })
    });
</script>

<script>    

    $(document).ready(function (){
        $(document).on('click', '#hapusItem', function(){
            $('#confirmasiItem').modal('hide');
        });

        $('#hapusItem').click(function(){
            $.ajax({
                url     : 'hapus-temp-item'+ id,
                method  : 'GET',
                dataType: 'JSON',

                beforeSend:function(){
                    $('#hapusItem').text('Deleting...');
                },

                success : function(response){
                            if(response.success == 1){
                                $('#confirmasiItem').modal('hide');
                                load()
                            } else {
                                alert('Oppzz... Periksa Kembali Inputan');
                            }
                }   
            });
        });
    });
</script>

<script>

    $(document).ready(function(){
        $(document).on('click', '#hapusAll', function(){
            $('#confirmasiAll').modal('show');
        });

        $('#hapusAllOk').click(function(){
            $.ajax({
                url         : '{{ route('hapus-temp-all') }}',
                method      : 'POST',
                data : {
                        "_token": "{{ csrf_token() }}",
                    },
                dataType    : 'JSON',
                success     : function(response){
                                if(response.success == 1){
                                    $('#confirmasiAll').modal('hide');
                                    load()
                                } else {
                                    alert('Oppzz... Periksa Kembali Inputan');
                                }
                }   
            });
        });

    })
</script>

<script>

    $(document).ready(function(){
        $('#simpan-temp').click(simpanTemp);
    })

        function load(){
            $('#table1').load('panggil-temp');
        }

        function kosong(){
            $('#isbn').val('');
            $('#judul').val('');
            $('#jumlah').val('');
        }
   
       function simpanTemp() {

            var isbn = $('#isbn').val();
            var judul = $('#judul').val();
            var jumlah = $('#jumlah').val();

            if( isbn == ''){
                alert('Isbn Buku harus diisi');
            } else if (judul == '') {
                alert('Judul Buku harus diisi');
            } else if ( jumlah == '') {
                alert('Jumlah Buku harus diisi');
            } else {
                $.ajax({
                    method: 'POST',
                    url : '{{ route('simpan-temp') }}',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        'isbn' : isbn,
                        'judul' : judul,
                        'jumlah' : jumlah,
                    },
                    dataType: 'json',
                    cache   : false,
                    success : function(response){
                        console.log(response);
                        if(response.success == 1){
                            kosong()
                            load()
                        } else {
                            alert('Oppzz... Periksa Kembali Inputan');
                        }
                    }
                    
                });
            }
        };
</script>

@endpush

@endsection
