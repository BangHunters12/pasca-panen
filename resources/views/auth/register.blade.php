<!DOCTYPE html>
<<<<<<< HEAD
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 2px solid #28a745;
        }

        .header-register {
         display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}

.header-register img {
    height: 36px;
    margin-right: 10px;
}

.header-register h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #4b8b63; 
    margin: 0;
    border: none;
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
        }

        .google-btn img {
            width: 20px;
            margin-right: 8px;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        small a {
            color: #218838;
            font-weight: 500;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before, .divider::after {
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
                <div class="header-register">
    <img src="{{ asset('assets/images/logos/logoapk.png') }}" alt="Logo">
    <h2>REGISTER</h2>
</div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                                <label for="nama_lengkap">Nama lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="masukkan nama" required>        
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="masukkan email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="masukkan password" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Pilih Jenis </option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan nomor telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">I agree to the terms and privacy policy</label>
                        </div>
                        <button type="submit" class="btn btn-green btn-block">Create Account</button>
                        <div class="divider">OR</div>
                        <a href="#" class="btn btn-light btn-block google-btn">
                        <img src="{{ asset('assets/images/logos/google.png') }}" alt="Google" style="height: 20px;" class="me-2">
                        Sign up with Google
                        </a>
                        <div class="text-center mt-3">
                            <small>Already have an account? <a href="{{ route('login') }}">Log In</a></small>
                        </div>
                    </form>
                </div>
            </div>
=======
<html>
<head>
    <title>Register Petani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center">Daftar Akun Petani</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-grid">
                    <button class="btn btn-success">Daftar</button>
                </div>
                <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
            </form>
>>>>>>> dd45b93e88abbeb14c7990c007a210435a336c49
        </div>
    </div>
</div>
</body>
</html>
