<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Padi;

class HomeController extends Controller
{
    public function index()
{
    $berita = Berita::latest()->get();
    $padi = Padi::latest()->get();
     // Ambil 3 berita terbaru
    return view('user.beranda', compact('berita', 'padi'));
}

public function show($id)
{
    $berita = Berita::findOrFail($id);
    return view('user.detailberita', compact('berita'));
}

public function penjualanView()
{
    $padiList = Padi::all(); // ambil semua data padi
    return view('user.penjualan_padi.penjualanpadi', compact('padiList'));
}
}
