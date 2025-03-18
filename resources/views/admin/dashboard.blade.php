@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <!-- Main Content -->
            <main id="main-content" class="col-md-10 col-lg-10">
                <h2 class="mt-0 p-0">Dashboard</h2>
                <p>Ringkasan aktivitas pasca panen padi</p>
            </main>
        </div>
    </div>

                <!-- Summary Cards -->
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card bg-light text-black p-3 text-center">
                            <h5>Total Petani</h5>
                            <p class="fs-3">5</p>
                            <span class="text-success">⬆ 12% dari bulan lalu</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card bg-light text-black p-3 text-center">
                            <h5>Total Penjualan Padi</h5>
                            <p class="fs-3">Rp 6.035.000</p>
                            <span class="text-success">⬆ 8% dari bulan lalu</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card bg-light text-black p-3 text-center">
                            <h5>Produksi Beras</h5>
                            <p class="fs-3">4.760 kg</p>
                            <span class="text-success">⬆ 5% dari bulan lalu</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card bg-light text-black p-3 text-center">
                            <h5>Total Pendapatan</h5>
                            <p class="fs-3">Rp 3.790.000</p>
                            <span class="text-success">⬆ 10% dari bulan lalu</span>
                        </div>
                    </div>
                </div>

                <!-- Graphs & Tables -->
                <div class="row mt-4 g-3">
                    <div class="col-12 col-lg-6">
                        <div class="card p-3 bg-light text-black">
                            <h5 class="text-center">Penjualan Padi (Bulanan)</h5>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card p-3 bg-light text-black">
                            <h5 class="text-center">Kategori Produk</h5>
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 g-3">
                    <div class="col-12 col-lg-6">
                        <div class="card p-3 bg-light text-black">
                            <h5 class="text-center">Penjualan Terbaru</h5>
                            <table class="table table-light table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Petani</th>
                                        <th>Jumlah (kg)</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15 Jan 2024</td>
                                        <td>Budi Santoso</td>
                                        <td>100</td>
                                        <td>Rp 500.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card p-3 bg-light text-black">
                            <h5 class="text-center">Hutang Petani</h5>
                            <table class="table table-light table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Petani</th>
                                        <th>Jumlah Hutang</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15 Okt 2023</td>
                                        <td>Budi Santoso</td>
                                        <td>Rp 500.000</td>
                                        <td><span class="badge bg-warning">Belum Lunas</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- ChartJS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function () {
            let sidebar = document.getElementById('sidebar');
            let mainContent = document.getElementById('main-content');
    
            // Toggle kelas untuk menyembunyikan sidebar dan memperlebar main content
            sidebar.classList.toggle('collapsed-sidebar');
            mainContent.classList.toggle('expanded-content');
        });
    </script>
    <script>
        const salesChart = new Chart(document.getElementById('salesChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
                datasets: [{
                    label: 'Penjualan Padi',
                    data: [1200000, 1800000, 1500000, 1450000, 0],
                    backgroundColor: 'green'
                }]
            }
        });

        const categoryChart = new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: ['Pupuk', 'Pestisida', 'Benih'],
                datasets: [{
                    data: [40, 20, 40],
                    backgroundColor: ['green', 'yellow', 'blue']
                }]
            }
        });
    </script>
@endsection
