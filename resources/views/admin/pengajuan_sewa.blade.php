@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <h4 class="mb-3">Data Pengajuan Sewa</h4>

    {{-- Button Tambah --}}
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">+ Tambah Pengajuan</button>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Petani</th>
                    <th>Jenis Sewa</th>
                    <th>Tanggal</th>
                    <th>Lama (hari)</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $item)
                <tr>
                    <td>{{ $item->petani->nama_lengkap ?? 'Petani tidak ditemukan' }}</td>
                    <td>{{ $item->jenisSewa->nama_sewa ?? 'Jenis sewa tidak ditemukan' }}</td>
                    <td>{{ $item->tanggal_sewa }}</td>
                    <td>{{ $item->lama_sewa_hari }}</td>
                    <td>Rp{{ number_format($item->biaya_sewa, 2, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id_pengajuan }}">Edit</button>

                        {{-- Form Hapus --}}
                        <form action="{{ route('admin.pengajuan_sewa.destroy', $item->id_pengajuan) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{ $item->id_pengajuan }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <form action="{{ route('admin.pengajuan_sewa.update', $item->id_pengajuan) }}" method="POST" class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Pengajuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body row g-3">
                                <div class="col-md-6">
                                    <label>Petani</label>
                                    <select name="id_petani" class="form-control" required>
                                        <option value="">-- Pilih Petani --</option>
                                        @foreach($petani as $p)
                                            <option value="{{ $p->id_petani }}" {{ $item->id_petani == $p->id_petani ? 'selected' : '' }}>
                                                {{ $p->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Jenis Sewa</label>
                                    <select name="id_sewa" class="form-control" required>
                                        <option value="">-- Pilih Jenis Sewa --</option>
                                        @foreach($jenisSewa as $s)
                                            <option value="{{ $s->id_sewa }}" {{ $item->id_sewa == $s->id_sewa ? 'selected' : '' }}>
                                                {{ $s->nama_sewa }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal Sewa</label>
                                    <input type="date" name="tanggal_sewa" value="{{ $item->tanggal_sewa }}" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Lama Sewa (hari)</label>
                                    <input type="number" name="lama_sewa_hari" value="{{ $item->lama_sewa_hari }}" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Biaya Sewa</label>
                                    <input type="number" step="0.01" name="biaya_sewa" value="{{ $item->biaya_sewa }}" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Status</label>
                                    <input type="text" name="status" value="{{ $item->status }}" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" value="{{ $item->keterangan }}" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.pengajuan_sewa.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengajuan Sewa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label>Petani</label>
                    <select name="id_petani" class="form-control" required>
                        <option value="">-- Pilih Petani --</option>
                        @foreach($petani as $p)
                            <option value="{{ $p->id_petani }}">{{ $p->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Jenis Sewa</label>
                    <select name="id_sewa" class="form-control" required>
                        <option value="">-- Pilih Jenis Sewa --</option>
                        @foreach($jenisSewa as $s)
                            <option value="{{ $s->id_sewa }}">{{ $s->nama_sewa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Lama Sewa (hari)</label>
                    <input type="number" name="lama_sewa_hari" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Biaya Sewa</label>
                    <input type="number" step="0.01" name="biaya_sewa" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
