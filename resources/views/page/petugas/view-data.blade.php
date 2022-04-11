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
                        <h5>Data Petugas</h5>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('tambah-petugas') }}" class="btn btn-info btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nohp / Wa</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($petugas as $i => $data )
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $data->nama_petugas }}</td>
                                <td>{{ $data->jabatan_petugas }}</td>
                                <td>{{ $data->nohp_petugas }}</td>
                                <td>{{ $data->email_petugas }}</td>
                                <td>{{ $data->alamat_petugas }}</td>
                                <td>
                                    <a href="{{ route('edit-petugas', $data->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('hapus-petugas', $data->id) }}"
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
