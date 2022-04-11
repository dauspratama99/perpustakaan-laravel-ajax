 @extends('layout.index')

 @section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-sm-12">
          <h1 class="m-0" style="color: black"><marquee>Selamat Datang Di Halaman Dashboard Pustaka Mulia</marquee></h1>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: gold">
            <div class="inner">
              <h3>150</h3>

              <p>Jumlah Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: azure">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Persentase Peminjaman</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box " style="background-color: gold">
            <div class="inner">
              <h3>44</h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color:azure">
            <div class="inner">
              <h3>5</h3>

              <p>Kategori Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
     
  </section>
  <!-- /.content -->
 @endsection
 