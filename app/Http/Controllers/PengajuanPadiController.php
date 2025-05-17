<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPadi;
use Illuminate\Http\Request;
use App\Models\Padi;

class PengajuanPadiController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanPadi::with('padi')->latest()->get();
        return view('admin.pengajuanpadi.index', compact('pengajuan'));
    }

    // Menyimpan pengajuan dari user (dengan dummy petani)
    public function store(Request $request)
    {
        $request->validate([
            'id_padi' => 'required|exists:padi,id_padi',
            'perlu_mobil' => 'required|boolean',
            'jumlah_karung' => 'required|integer|min:1',
            'tanggal_pengajuan' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Dummy ID petani
        $id_petani_dummy = 1;

        // Generate ID unik seperti pd_0001
        $lastId = PengajuanPadi::orderBy('id_pengajuan', 'desc')->first();
        $lastNumber = $lastId ? intval(substr($lastId->id_pengajuan, 3)) : 0;
        $newId = 'pd_' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        PengajuanPadi::create([
            'id_pengajuan' => $newId,
            'id_petani' => $id_petani_dummy,
            'id_padi' => $request->id_padi,
            'perlu_mobil' => $request->perlu_mobil,
            'jumlah_karung' => $request->jumlah_karung,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'keterangan' => $request->keterangan,
            'status' => 'menunggu persetujuan',
        ]);

        return back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    // Untuk mengubah status pengajuan oleh admin
    public function updateStatus(Request $request, $id_pengajuan)
    {
        $request->validate([
            'status' => 'required|in:menunggu persetujuan,disetujui,ditolak',
        ]);

        $pengajuan = PengajuanPadi::findOrFail($id_pengajuan);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        return back()->with('success', 'Status berhasil diperbarui.');
    }
}
