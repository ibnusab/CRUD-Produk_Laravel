<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Kategori::count();
        $totalProduk   = Produk::count();
        $totalStok     = Produk::sum('stok');

        $produkTerbaru = Produk::latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalKategori',
            'totalProduk',
            'totalStok',
            'produkTerbaru'
        ));
    }
}