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
                        <h5>Data Buku</h5>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('tambah-buku') }}" class="btn btn-info btn-sm">Tambah Data</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Isbn</th>
                                <th>Judul</th>
                                <th>Tahun Terbit</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Rak</th>
                                <th>Jumlah</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $i => $data )
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $data->isbn_buku }}</td>
                                <td>{{ $data->judul_buku }}</td>
                                <td>{{ $data->tahun_terbit }}</td>
                                <td>{{ $data->penerbit_buku }}</td>
                                <td>{{ $data->pengarang_buku }}</td>
                                <td>{{ $data->nama_rak }}</td>
                                <td>{{ $data->jumlah_buku }}</td>
                                <td><img src="{{ asset('gambar/'. $data->gambar) }}" alt="Images" width="30px"></td>
                                <td>
                                    <a href="{{ route('edit-buku', $data->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('hapus-buku', $data->id) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

</script>

@if(session('success') != '')
<script>
    toastr.success('{{ session('success') }}')
</script>
@endif
@if(session('error')  != '')
<script>
    toastr.error('{{ session('error') }}')
</script>
@endif

@endpush




@endsection
