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
                        <h5>Data Peminjaman</h5>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('tambah-peminjaman') }}" class="btn btn-info btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Peminjaman</th>
                               
                                <th>Nama Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $i => $data )
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $data->kode_pinjam }}</td>
                                 
                                <td>{{ $data->nama_anggota }}</td>
                                <td>{{ date('d F Y', strtotime($data->tgl_pinjam)) }}</td>
                                <td>{{ date('d F Y', strtotime($data->tgl_kembali)) }}</td>
                                <td>
                                    <a href="{{ route('detail-peminjaman', $data->id) }}"
                                        class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('cetak-bukti-peminjaman', $data->id) }}"
                                        class="btn btn-xs btn-primary"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('hapus-peminjaman', $data->id) }}"
                                        class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
