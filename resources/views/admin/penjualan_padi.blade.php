@extends('layouts/admin.admin')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penjualan Padi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Form Penjualan Padi</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_petani" class="form-label">Petani</label>
                <select class="form-select @error('id_petani') is-invalid @enderror" id="id_petani" name="id_petani" required>
                    <option value="">Pilih Petani</option>
                    @foreach($petani as $p)
                        <option value="{{ $p->id_petani }}">{{ $p->nama_petani }}</option>
                    @endforeach
                </select>
                @error('id_petani')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_padi" class="form-label">Jenis Padi</label>
                <select class="form-select @error('id_padi') is-invalid @enderror" id="id_padi" name="id_padi" required>
                    <option value="">Pilih Jenis Padi</option>
                    @foreach($padi as $p)
                        <option value="{{ $p->id_padi }}">{{ $p->nama_padi }}</option>
                    @endforeach
                </select>
                @error('id_padi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_kg" class="form-label">Jumlah (Kg)</label>
                <input type="number" class="form-control @error('jumlah_kg') is-invalid @enderror" id="jumlah_kg" name="jumlah_kg" required>
                @error('jumlah_kg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="number" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" required>
                @error('total_harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Penjualan</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="potongan_hutang" class="form-label">Potongan Hutang</label>
                <input type="number" class="form-control" id="potongan_hutang" name="potongan_hutang">
            </div>

            <div class="mb-3">
                <label for="potongan_hutang_penyewaan" class="form-label">Potongan Hutang Penyewaan</label>
                <input type="number" class="form-control" id="potongan_hutang_penyewaan" name="potongan_hutang_penyewaan">
            </div>

            <div class="mb-3">
                <label for="potongan_hutang_produk" class="form-label">Potongan Hutang Produk</label>
                <input type="number" class="form-control" id="potongan_hutang_produk" name="potongan_hutang_produk">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
        </form>
    </div>
</body>
</html>

@endsection
