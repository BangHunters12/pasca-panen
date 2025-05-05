<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #e6f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 2px solid #28a745;
        }

        .logo {
            display: block;
            margin: 0 auto 10px auto;
            height: 40px;
        }

        h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: #4b8b63;
        }

        .btn-green {
            background-color: #28a745;
            color: white;
            font-weight: 600;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        .google-btn {
            border: 1px solid #ddd;
            font-weight: 500;
            background-color: white;
        }

        .google-btn img {
            width: 20px;
            margin-right: 8px;
        }

        a {
            color: #28a745;
            font-weight: 500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ccc;
        }

        .divider:not(:empty)::before {
            margin-right: .5em;
        }

        .divider:not(:empty)::after {
            margin-left: .5em;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logos/logoapk.png') }}" alt="Logo" class="logo">
                        <h2>LOGIN</h2>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi" required>
                            </div>

                            <div class="form-group form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" class="btn btn-green btn-block w-100 mb-3">Masuk</button>

                            <div class="divider">ATAU</div>

                            <a href="#" class="btn google-btn w-100 mb-3 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/logos/google.png') }}" alt="Google"> Masuk dengan Google
                            </a>

                            <div class="text-center">
                                <a href="#">Lupa kata sandi?</a><br>
                                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
