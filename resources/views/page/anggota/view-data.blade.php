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
                        <h5>Data Anggota</h5>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('tambah-anggota') }}" class="btn btn-info btn-sm">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Nohp / Wa</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $i => $data )
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    <a href="{{ route('qrcode-anggota', $data->id) }}" class="btn btn-xs btn-primary">QR</a>
                                    {{ $data->nim_anggota }}
                                </td>
                                <td>{{ $data->nama_anggota }}</td>
                                <td>{{ $data->jk_anggota }}</td>
                                <td>{{ $data->nohp_anggota }}</td>
                                <td>{{ $data->email_anggota }}</td>
                                <td>{{ $data->alamat_anggota }}</td>
                                <td>
                                    <a href="{{ route('edit-anggota', $data->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('hapus-anggota', $data->id) }}"
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
