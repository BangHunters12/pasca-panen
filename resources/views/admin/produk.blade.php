@extends('layouts.admin.admin')

@section('content')
<div class="container mt-4">
    <h4>Data Produk</h4>
    <div class="d-flex justify-content-between mb-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Produk</button>
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari produk...">
    </div>

    <table class="table table-bordered" id="produkTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->satuan }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_produk }}">Edit</button>
                    <form action="{{ route('admin.produk.destroy', $item->id_produk) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Delete</button>
                    </form>
                </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $item->id_produk }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.produk.update', $item->id_produk) }}" method="POST">
                        @csrf @method('POST')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Produk</h5>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="nama_produk" value="{{ $item->nama_produk }}" class="form-control mb-2" required>
                                <select name="kategori" class="form-control mb-2" required>
    @foreach($kategori as $kat)
        <option value="{{ $kat }}" {{ $item->kategori == $kat ? 'selected' : '' }}>
            {{ ucfirst($kat) }}
        </option>
    @endforeach
</select>

                                <input type="number" name="harga" value="{{ $item->harga }}" class="form-control mb-2" required>
                                <input type="number" name="stok" value="{{ $item->stok }}" class="form-control mb-2" required>
                                <input type="text" name="satuan" value="{{ $item->satuan }}" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.produk.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama_produk" class="form-control mb-2" placeholder="Nama Produk" required>
                    <select name="kategori" class="form-control mb-2" required>
                    <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat }}">{{ ucfirst($kat) }}</option>
                 @endforeach
                    </select>

                    <input type="number" name="harga" class="form-control mb-2" placeholder="Harga" required>
                    <input type="number" name="stok" class="form-control mb-2" placeholder="Stok" required>
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    var input = this.value.toLowerCase();
    var rows = document.querySelectorAll("#produkTable tbody tr");
    rows.forEach(function(row) {
        row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
    });
});
</script>
@endsection
