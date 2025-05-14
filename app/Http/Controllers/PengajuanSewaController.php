<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSewa;
use App\Models\Petani;
use App\Models\JenisSewa;
use Illuminate\Http\Request;

class PengajuanSewaController extends Controller
{
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
}
