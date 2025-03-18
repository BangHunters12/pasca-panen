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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Include -->
        @include('layouts.sidebar')
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

    <script src="{{ asset('js/script.js') }}"></script>

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
