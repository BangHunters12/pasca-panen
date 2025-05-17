<?php

// namespace App\Http\Controllers;

// use App\Models\Petani;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;

// class PetaniAuthController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     public function showRegisterForm()
//     {
//         return view('auth.register');
//     }

//     public function login(Request $request)
//     {
//         $request->validate([
//             'login' => 'required|string',
//             'password' => 'required|string',
//         ]);

//         $petani = Petani::where('email', $request->login)
//             ->orWhere('username', $request->login)
//             ->first();

//         if ($petani && Hash::check($request->password, $petani->password)) {
//             Session::put('petani', $petani);


//             return redirect('/#')->with('success', 'Login berhasil');
//         }

//         return back()->withErrors([
//             'login' => 'Username/email atau password salah',
//         ])->withInput();
//     }

//     public function register(Request $request)
//     {
//         $request->validate([
//             'nama_lengkap' => 'required|string|max:255',
//             'username' => 'required|string|unique:petani,username',
//             'gender' => 'required|in:Laki-laki,Perempuan',
//             'email' => 'required|email|unique:petani,email',
//             'no_telp' => 'required|string|max:20',
//             'alamat' => 'required|string',
//             'password' => 'required|string|min:6|confirmed',
//         ]);

//         $petani = Petani::create([
//             'nama_lengkap' => $request->nama_lengkap,
//             'username' => $request->username,
//             'gender' => $request->gender,
//             'email' => $request->email,
//             'no_telp' => $request->no_telp,
//             'alamat' => $request->alamat,
//             'password' => Hash::make($request->password),
//             'role' => 'petani', // default value
//         ]);

//         Session::put('petani', $petani);
//         return redirect('/login')->with('success', 'Registrasi berhasil');
//     }

//     public function logout()
//     {
//         Session::forget('petani');
//         return redirect('/login')->with('success', 'Berhasil logout');
//     }
// }
