<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $beritas = Berita::latest()->take(3)->get(); // Ambil 3 berita terbaru
    return view('user.beranda', compact('beritas'));
}
}
