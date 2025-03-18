<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar text-dark" id="sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between p-3">
                    <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img mb-3 mt-0">
                        <img src="/assets/images/logos/dark-logo.svg" width="220" alt="Logo" />
                    </a>
                </div>
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav" class="nav flex-column">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.dashboard') }}"><i class="ti ti-layout-dashboard"></i> Dashboard</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.petani') }}"><i class="ti ti-user"></i> Petani</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.hutang') }}"><i class="ti ti-cash"></i> Hutang Petani</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.penjualan_padi') }}"><i class="ti ti-shopping-cart"></i> Penjualan Padi</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.produk') }}"><i class="ti ti-package"></i> Produk</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.penyewaan') }}"><i class="ti ti-tool"></i> Penyewaan</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.pengiriman') }}"><i class="ti ti-truck"></i> Pengiriman</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.produksi_beras') }}"><i class="ti ti-building"></i> Produksi Beras</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.laporan') }}"><i class="ti ti-report"></i> Laporan</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.pengaturan') }}"><i class="ti ti-settings"></i> Pengaturan</a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper" id="content">
            <!-- Header Start -->
            <header class="app-header p-3 bg-light shadow-sm d-flex justify-content-between align-items-center">
                <button class="btn btn-outline-secondary" id="sidebarCollapse">☰</button>
                <div>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </header>
            <!-- Header End -->
            <div class="container-fluid p-4 mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sidebar = document.getElementById("sidebar");
            let content = document.getElementById("content");
            document.querySelectorAll(".sidebar-link").forEach(link => {
                if (window.location.href.includes(link.getAttribute("href"))) {
                    link.classList.add("active");
                }
            });

            document.getElementById("sidebarCollapse").addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");
                content.classList.toggle("full-width");
                if (window.innerWidth <= 768) {
                    sidebar.style.left = sidebar.classList.contains("collapsed") ? "0" : "-250px";
                }
            });

            window.addEventListener("resize", function() {
                if (window.innerWidth > 768) {
                    sidebar.style.left = "0";
                }
            });
        });
    </script>
</body>
</html>
