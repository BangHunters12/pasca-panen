<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Padi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(45deg, #198754, #28a745);
        }
        .jumbotron {
            position: relative;
            height: 500px;
            background: url('/assets/images/logos/dark-logo.svg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.3);
        }
        .jumbotron h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            color: #198754;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .footer {
            background: linear-gradient(45deg, #198754, #28a745);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Manajemen Padi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#info-padi">Informasi Padi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-light text-success px-3" href="#register">Register/Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <h1>Selamat Datang di Manajemen Padi</h1>
    </div>

    <div id="info-padi" class="container py-5">
        <h2 class="section-title">Informasi Padi</h2>
        <p class="text-center">Kami menyediakan informasi tentang jenis padi, harga pasar, dan kualitas padi terbaik.</p>
    </div>

    <div id="produk" class="container py-5 bg-light">
        <h2 class="section-title">Produk</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/assets/images/logos/dark-logo.svg" class="card-img-top" alt="Pupuk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pupuk Berkualitas</h5>
                        <p class="card-text">Dapatkan pupuk terbaik untuk hasil panen optimal.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/assets/images/logos/dark-logo.svg" class="card-img-top" alt="Pestisida">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pestisida Efektif</h5>
                        <p class="card-text">Melindungi tanaman dari hama dengan pestisida terbaik.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/assets/images/logos/dark-logo.svg" class="card-img-top" alt="Alat Pertanian">
                    <div class="card-body text-center">
                        <h5 class="card-title">Alat Pertanian</h5>
                        <p class="card-text">Membantu efisiensi dalam pengelolaan pertanian.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="container py-5">
        <h2 class="section-title">Tentang Kami</h2>
        <p class="text-center">Kami berkomitmen untuk membantu petani dalam pengelolaan hasil panen dan penyediaan alat pertanian.</p>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Manajemen Padi. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>