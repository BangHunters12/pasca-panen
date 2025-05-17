@extends('layouts/admin.admin')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 fw-bold">Daftar Pengajuan Padi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Nama Padi</th>
                <th>Jumlah Karung</th>
                <th>Perlu Mobil</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengajuan as $item)
                <tr>
                    <td>{{ $item->id_pengajuan }}</td>
                    <td>{{ $item->padi->nama_padi ?? '-' }}</td>
                    <td>{{ $item->jumlah_karung }}</td>
                    <td>{{ $item->perlu_mobil ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('pengajuan.updateStatus', $item->id_pengajuan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="menunggu persetujuan" {{ $item->status == 'menunggu persetujuan' ? 'selected' : '' }}>Menunggu</option>
                                <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        {{-- Opsional hapus jika kamu mau --}}
                        {{-- <form action="{{ route('pengajuan.destroy', $item->id_pengajuan) }}" method="POST" onsubmit="return confirm('Yakin?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada pengajuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection