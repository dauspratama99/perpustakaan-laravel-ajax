  <!-- Main Sidebar Container -->
  <aside class="main-sidebar" style="background-color: gold; color:black";>
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     
      <span class="brand-text font-weight-light pl-5" style="color:black"><b>Pustaka Mulia</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: white; color:black">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('home') }}" class="nav-link active" style="background-color: gold">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('jenis-buku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jenis Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rak-buku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Rak Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('buku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('petugas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Petugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('anggota') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
             
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('peminjaman') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pengembalian') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporan-per-jenis') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap Per Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-per-rak') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap Per Rak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-buku') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-petugas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap Petugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-anggota') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap Anggota</p>
                </a>
              </li>
            </ul>
          </li>

       

          <li class="nav-item pl-2">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p class="pl-2">
                Keluar
              </p>
            </a>
          </li>

        
        
       
      
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>