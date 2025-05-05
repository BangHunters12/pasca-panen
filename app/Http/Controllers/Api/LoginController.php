<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input dari request
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',   // Bisa berupa email atau username
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Ambil data petani berdasarkan email atau username
        $petani = Petani::where('email', $request->login)
                        ->orWhere('username', $request->login)
                        ->first();

        // Cek apakah petani ditemukan dan password cocok
        if (!$petani || !Hash::check($request->password, $petani->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Generate token login dengan Sanctum
        $token = $petani->createToken('mobile')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'petani' => $petani,
        ]);
    }
}
