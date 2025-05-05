<?php

namespace App\Http\Controllers;

use App\Models\Padi;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PadiController extends Controller
{
    public function index()
    {
        $padis = Padi::all();
        return view('admin.padi.index', compact('padis'));
    }

    public function create()
    {
        return view('admin.padi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_padi' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'bentuk' => 'required|string|max:255',
            'tekstur' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('public/gambar_padi');

        Padi::create([
            'nama_padi' => $request->nama_padi,
            'warna' => $request->warna,
            'bentuk' => $request->bentuk,
            'tekstur' => $request->tekstur,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.padi.index')->with('success', 'Data Padi berhasil ditambahkan!');
    }

    public function edit($id_padi)
    {
        $padi = Padi::findOrFail($id_padi);
    return view('admin.padi.edit', compact('padi'));
    }

    public function update(Request $request, $id_padi)
    {
        $request->validate([
            'nama_padi' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'bentuk' => 'required|string|max:255',
            'tekstur' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $padi = Padi::findOrFail($id_padi);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($padi->gambar) {
                $oldImagePath = storage_path('app/public/gambar_padi/' . $padi->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('public/gambar_padi');
            $padi->gambar = basename($gambarPath); // Menyimpan nama file gambar
        }
        
        $padi->update([
            'nama_padi' => $request->nama_padi,
            'warna' => $request->warna,
            'bentuk' => $request->bentuk,
            'tekstur' => $request->tekstur,
            'harga' => $request->harga,
            'gambar' => basename($gambarPath),
        ]);

        return redirect()->route('admin.padi.index')->with('success'. 'Data padi berhasil diperbaharui');
    }

    public function destroy($id_padi)
    {
        $padi = Padi::findOrFail($id_padi);

        if ($padi->gambar) {
            unlink(storage_path('app/'.$padi->gambar));
        }

        $padi->delete();

        return redirect()->route('admin.padi.index')->with('success', " Data Padi Berhasil Dihapus!");
    }

}
