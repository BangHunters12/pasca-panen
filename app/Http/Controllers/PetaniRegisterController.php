<?php

namespace App\Http\Controllers;


use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetaniRegisterController extends Controller
{
    
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petani,username',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:petani,email',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'password' => 'required|string|confirmed|min:6',
        ]);

        Petani::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }
}
