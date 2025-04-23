<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // =====================
    // REGISTER
    // =====================
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string|unique:petani',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:petani',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $petani = Petani::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        $token = $petani->createToken('mobile')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil',
            'petani' => [
                'id' => $petani->id,
                'nama_lengkap' => $petani->nama_lengkap,
                'username' => $petani->username,
                'gender' => $petani->gender,
                'email' => $petani->email,
                'no_telp' => $petani->no_telp,
                'alamat' => $petani->alamat,
            ],
            'token' => $token,
        ], 201);
    }

   // =====================
// LOGIN
// =====================
public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid input',
            'errors' => $validator->errors(),
        ], 400);
    }

    // Cek apakah petani ada berdasarkan email atau username
    $petani = Petani::where('email', $request->login)
        ->orWhere('username', $request->login)
        ->first();

    // Validasi password
    if (!$petani || !Hash::check($request->password, $petani->password)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    // Membuat token baru
    $token = $petani->createToken('mobile')->plainTextToken;

    // Hanya kirimkan data yang diperlukan, hindari data sensitif seperti password
    return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'token' => $token,
        'user' => [
            'id' => $petani->id,
            'nama_lengkap' => $petani->nama_lengkap,
            'username' => $petani->username,
            'gender' => $petani->gender,
            'email' => $petani->email,
            'no_telp' => $petani->no_telp,
            'alamat' => $petani->alamat,
        ],
    ]);
}
}