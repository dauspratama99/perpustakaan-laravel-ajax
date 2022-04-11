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
                        <h5>Data Pengembalian Buku</h5>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('tambah-pengembalian') }}" class="btn btn-info btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Isbn</th>
                                <th>Judul Buku</th>
                                <th>Jumlah</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengembalian as $i => $data )
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $data->nama_anggota }}</td>
                                <td>{{ $data->isbn_buku }}</td>
                                <td>{{ $data->judul_buku }}</td>
                                <td>{{ $data->qty }}</td>
                                <td>Rp. {{ number_format($data->denda) }}</td>
                                <td>
                                    <a href="{{ route('cetak-bukti-peminjaman', $data->id) }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('cetak-bukti-peminjaman', $data->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('hapus-peminjaman', $data->id) }}"
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
