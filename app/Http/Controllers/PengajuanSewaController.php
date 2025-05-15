<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\PengajuanSewa;
use App\Models\Petani;
use App\Models\JenisSewa;
>>>>>>> dd45b93e88abbeb14c7990c007a210435a336c49
use Illuminate\Http\Request;

class PengajuanSewaController extends Controller
{
<<<<<<< HEAD
//     public function store(Request $request)
// {
//     $request->validate([
//         'id_petani' => 'required',
//         'id_sewa' => 'required',
//         'tanggal_sewa' => 'required|date',
//         'lama_sewa_hari' => 'required|integer',
//         'biaya_sewa' => 'required|numeric',
//         'keterangan' => 'nullable|string',
//     ]);

//     \App\Models\DPengajuan::create([
//         'id_petani' => $request->id_petani,
//         'id_sewa' => $request->id_sewa,
//         'tanggal_sewa' => $request->tanggal_sewa,
//         'lama_sewa_hari' => $request->lama_sewa_hari,
//         'biaya_sewa' => $request->biaya_sewa,
//         'status' => 'pending', // default status
//         'keterangan' => $request->keterangan,
//     ]);

//     return redirect()->back()->with('success', 'Pengajuan sewa berhasil dikirim!');
// }
=======
    public function index()
    {
        $pengajuan = PengajuanSewa::with('petani', 'jenisSewa')->get();
        $petani = Petani::all();
        $jenisSewa = JenisSewa::all();

        return view('admin.pengajuan_sewa', compact('pengajuan', 'petani', 'jenisSewa'));
    }

    public function store(Request $request)
    {
        PengajuanSewa::create($request->all());
        return redirect()->back()->with('success', 'Pengajuan sewa berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        PengajuanSewa::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success', 'Pengajuan sewa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PengajuanSewa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pengajuan sewa berhasil dihapus.');
    }
>>>>>>> dd45b93e88abbeb14c7990c007a210435a336c49
}
