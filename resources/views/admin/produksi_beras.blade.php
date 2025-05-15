@extends('layouts.admin.admin')

@section('content')
<div class="container mt-4">
    <h4>Data Produksi Beras</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Data</button>
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari data...">
    </div>

    <table class="table table-bordered" id="produksiTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Padi</th>
                <th>Tanggal</th>
                <th>Jml Padi (kg)</th>
                <th>Jml Beras (kg)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->padi->nama_padi ?? '-' }}</td>
                <td>{{ $item->tanggal_produksi }}</td>
                <td>{{ $item->jumlah_padi }}</td>
                <td>{{ $item->jumlah_beras }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_produksi }}">Edit</button>
                    <form action="{{ route('admin.produksi_beras.destroy', $item->id_produksi) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $item->id_produksi }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('admin.produksi_beras.update', $item->id_produksi) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Produksi</h5>
                            </div>
                            <div class="modal-body">
                                <select name="id_padi" class="form-control mb-2" required>
                                    @foreach($padi as $p)
                                        <option value="{{ $p->id }}" {{ $item->id_padi == $p->id ? 'selected' : '' }}>{{ $p->nama_padi }}</option>
                                    @endforeach
                                </select>
                                <input type="date" name="tanggal_produksi" value="{{ $item->tanggal_produksi }}" class="form-control mb-2" required>
                                <input type="number" name="jumlah_padi" value="{{ $item->jumlah_padi }}" class="form-control mb-2" required>
                                <input type="number" name="jumlah_beras" value="{{ $item->jumlah_beras }}" class="form-control mb-2" required>
                                <textarea name="keterangan" class="form-control">{{ $item->keterangan }}</textarea>
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
        <form action="{{ route('admin.produksi_beras.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produksi Beras</h5>
                </div>
                <div class="modal-body">
                    <select name="id_padi" class="form-control mb-2" required>
                        <option value="">Pilih Padi</option>
                        @foreach($padi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_padi }}</option>
                        @endforeach
                    </select>
                    <input type="date" name="tanggal_produksi" class="form-control mb-2" required>
                    <input type="number" name="jumlah_padi" class="form-control mb-2" placeholder="Jumlah Padi (kg)" required>
                    <input type="number" name="jumlah_beras" class="form-control mb-2" placeholder="Jumlah Beras (kg)" required>
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan (opsional)"></textarea>
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
    var rows = document.querySelectorAll("#produksiTable tbody tr");
    rows.forEach(function(row) {
        row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
    });
});
</script>
@endsection
