<?php

namespace App\Http\Controllers;
\Illuminate\Support\Facades\DB::enableQueryLog();
use App\Models\Petani;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    // Menampilkan daftar petani
    public function index()
    {
        $petanis = Petani::all();
        return view('admin.petani.index', compact('petanis'));
    }

    // Menampilkan form tambah petani
    public function create()
    {
        return view('admin.petani.create');
    }

    // Menyimpan data petani baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_petani' => 'required',
            'alamat_petani' => 'required',
            'username' => 'required|unique:petani',
            'email' => 'required|email|unique:petani',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'level' => 'required|in:prepetani,petani,admin',
        ]);

        Petani::create([
            'nama_petani' => $request->nama_petani,
            'alamat_petani' => $request->alamat_petani,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'level' => $request->level,
        ]);

        return redirect()->route('admin.petani.index')->with('success', 'Petani berhasil ditambahkan');
    }

    // Menampilkan form edit petani
    public function edit(Petani $petani)
    {
        return view('admin.petani.edit', compact('petani'));
    }

    // Memperbarui data petani
    public function update(Request $request, Petani $petani)
    {
        $request->validate([
            'nama_petani' => 'required',
            'alamat_petani' => 'required',
            'username' => 'required|unique:petani,username,' . $petani->id_petani,
            'email' => 'required|email|unique:petani,email,' . $petani->id_petani,
            'no_hp' => 'required',
            'level' => 'required|in:prepetani,petani,admin',
        ]);

        $data = $request->except('password');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $petani->update($data);

        return redirect()->route('admin.petani.index')->with('success', 'Petani berhasil diperbarui');
    }

    // Menghapus data petani
    public function destroy(Petani $petani)
    {
        $petani->delete();
        return redirect()->route('admin.petani.index')->with('success', 'Petani berhasil dihapus');
    }
}
