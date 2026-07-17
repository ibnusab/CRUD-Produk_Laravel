@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Dashboard</h2>
        <small class="text-muted">Selamat datang di Dashboard Sigma Store</small>
    </div>

    <div class="text-end">
        <small class="text-muted">
            {{ now()->format('d F Y') }}
        </small>
    </div>
</div>

<div class="row g-4">

    <!-- Total Produk -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total Produk</small>
                    <h2 class="fw-bold mt-2">
                        {{ $totalProduk }}
                    </h2>
                </div>

                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                     style="width:70px;height:70px;font-size:30px;">
                    📦
                </div>

            </div>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total Kategori</small>
                    <h2 class="fw-bold mt-2">
                        {{ $totalKategori }}
                    </h2>
                </div>

                <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center"
                     style="width:70px;height:70px;font-size:30px;">
                    📂
                </div>

            </div>
        </div>
    </div>

    <!-- Total Stok -->
    <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">

                <div>
                    <small class="text-muted">Total Stok</small>
                    <h2 class="fw-bold mt-2">
                        {{ $totalStok }}
                    </h2>
                </div>

                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                     style="width:70px;height:70px;font-size:30px;">
                    📊
                </div>

            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">
                    Produk Terbaru
                </h5>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <thead class="table-light">

                    <tr>

                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($produkTerbaru as $produk)

                        <tr>

                            <td>{{ $produk->kode_produk }}</td>

                            <td>{{ $produk->nama_produk }}</td>

                            <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>

                            <td>{{ $produk->stok }}</td>

                            <td>
                                Rp {{ number_format($produk->harga,0,',','.') }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center text-muted py-4">

                                Belum ada produk.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">

                <h5 class="mb-0 fw-bold">

                    Informasi

                </h5>

            </div>

            <div class="card-body">

                <p class="mb-2">
                    👤 Login sebagai:
                    <strong>{{ Auth::user()->name }}</strong>
                </p>

                <p class="mb-2">
                    📧 {{ Auth::user()->email }}
                </p>

                <hr>

                <p class="mb-2">
                    🏪 Sistem:
                    <strong>Sigma Store</strong>
                </p>

                <p class="mb-0">
                    🚀 Laravel 11 + Bootstrap 5
                </p>

            </div>

        </div>

    </div>

</div>

@endsection