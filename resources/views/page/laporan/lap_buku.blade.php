<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center mt-2">Perpustakaan Mulia Bersama</h2>
    <h5 class="text-center mt-2">Laporan Data Buku</h5>
    <hr style="border:1px solid black;">
    <br>
    <div class="container">
        <table>
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>
                    {{ date('d F Y') }}
                </td>
            </tr>
        </table>
    </div>
    <br>

    <div class="container">

        <table class="table table-bordered mb-4 table-striped">
            <tr>
                <th>No</th>
                <th style="text-align: center;">No ISBN</th>
                <th style="text-align: center;">Judul</th>
                <th style="text-align: center;">Tahun Terbit</th>
                <th style="text-align: center;">Penerbit</th>
                <th style="text-align: center;">Pengarang</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Rak</th>
                <th style="text-align: center;">Jumlah Stok</th>
                <th style="text-align: center;">Gambar</th>
            </tr>

            @foreach($buku as $no => $data)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$data->isbn_buku}}</td>
                <td style="text-align: center;">{{$data->judul_buku}}</td>
                <td style="text-align: center;">{{$data->tahun_terbit}}</td>
                <td style="text-align: center;">{{$data->penerbit_buku}}</td>
                <td style="text-align: center;">{{$data->pengarang_buku}}</td>
                <td style="text-align: center;">{{$data->nama_jenis}}</td>
                <td style="text-align: center;">{{$data->nama_rak}}</td>
                <td style="text-align: center;">{{$data->jumlah_buku}}</td>
                <td style="text-align: center;">
                    <img src="{{ asset('gambar/'. $data->gambar) }}" alt="" width="20px">
                </td>
            </tr>

            @endforeach

        </table>

        <br>
        <br>

        <div class="float-end text-center" style="padding: 1cm;padding-top:0%">
            <!-- <h6 class="text-center" style="margin-bottom: 2cm;">{{ date('d F Y') }}</h6> -->
            <span>Kepala Pustaka</span><br><br><br><br>
            <span>( ..................................... )</span><br>

        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>