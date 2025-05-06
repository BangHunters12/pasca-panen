@extends('layouts.user.user')
@section("content")

<div class="container pt-5 mt-5">

    {{-- Header --}}
    <div class="container section-title" data-aos="fade-up">
    <h2 class="fw-bold">Layanan</h2>
    <p class="lead">Pesan layanan yang anda butuhkan dengan cepat dan mudah</p>
  </div>

    {{-- Navigasi Layanan (ul seperti filter isotope) --}}
    <ul class="portfolio-filters isotope-filters list-inline mb-4 text-center" data-aos="fade-up" data-aos-delay="100">
        <li class="list-inline-item" data-filter=".filter-bajak">Alat Bajak</li>
        <li class="list-inline-item" data-filter=".filter-panen">Alat Panen</li>
        <li class="list-inline-item" data-filter=".filter-tenaga">Tenaga Tani</li>
        <li class="list-inline-item" data-filter=".filter-paket">Paket Petani Baru</li>
    </ul>

    {{-- Gambar --}}
    <div class="mb-4 text-center">
        <img src="{{ asset('assets/images/logos/alat_bajak.jpg') }}" alt="Alat Bajak" class="img-fluid rounded shadow-sm">
    </div>

    {{-- Konten Layanan --}}
    <h4 class="text-success fw-semibold">Layanan Alat Bajak</h4>
    <p>Sewa alat bajak modern untuk mengolah lahan dengan efisien. Cocok untuk semua jenis sawah dan ladang.</p>

    <h5 class="text-success mt-4">Fasilitas</h5>
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">Tersedia Bajak Traktor</li>
        <li class="list-group-item">Cocok untuk lahan luas atau sempit</li>
        <li class="list-group-item">Disertai operator berpengalaman</li>
    </ul>

    {{-- Tombol Aksi --}}
    <div class="text-center">
        <a href="#" class="btn btn-warning text-white fw-bold px-4">Pesan Sekarang!</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .portfolio-filters li {
        cursor: pointer;
        padding: 6px 12px;
        border-radius: 20px;
        transition: all 0.3s;
    }

    .portfolio-filters .filter-active {
        background-color: #198754;
        color: white;
    }

    .portfolio-filters li:hover {
        background-color: #19875420;
    }
</style>
@endsection

@section('scripts')
<!-- (Opsional) Tambahkan Isotope jika ingin filter aktif -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filters = document.querySelectorAll('.portfolio-filters li');
        filters.forEach(el => {
            el.addEventListener('click', function () {
                filters.forEach(f => f.classList.remove('filter-active'));
                this.classList.add('filter-active');

                // Untuk fungsionalitas Isotope (jika dipakai), atau bisa fetch konten pakai AJAX
                const filter = this.getAttribute('data-filter');
                console.log("Filter kategori:", filter); // contoh saja
            });
        });
    });
</script>
@endsection
