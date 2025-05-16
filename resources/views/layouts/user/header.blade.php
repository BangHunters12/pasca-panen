<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <div class="logo d-flex align-items-center me-auto me-lg-0">
            <img src="{{ asset('assets/images/logos/logoapk.png') }}" alt="Logo" style="height: 40px;">
          </div>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ url('/#beranda') }}" class="nav-link active">Beranda</a></li>
            <li><a href="{{ url('/#about') }}" class="nav-link active">Tentang kami</a></li>
            <li><a href="{{ route('user.penjualan_padi.index') }}" class="nav-link">Penjualan Padi</a></li>

            <li class="dropdown"><a href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pupuk</a></li>
                    <li><a class="dropdown-item" href="#">Obat-obatan</a></li>
                    <li><a class="dropdown-item" href="#">Beras</a></li>
                </ul>
            </li>

            <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Alat Tanam</a></li>
                    <li><a class="dropdown-item" href="#">Alat Panen</a></li>
                    <li><a class="dropdown-item" href="#">Tenaga Tanam</a></li>
                    <li><a class="dropdown-item" href="#">Petani Baru</a></li>
                </ul>
            </li>
            
            <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ url('/#berita') }}">Berita Tani</a></li>
                  <li><a class="dropdown-item" href="{{ url(path: '/#harga') }}">Harga Padi</a></li>
                  <li><a class="dropdown-item" href="{{ url('/#tips') }}">Tips Bertani</a></li>
              </ul>
          </li>
            <li><a href="{{ url('/#kontak') }}" class="nav-link">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="{{ url('/login') }}">Get Started</a>
</div>
</header>