@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">

        <h3>Detail Produk</h3>

    </div>

    <div class="card-body">

        @if($produk->foto)

        <img src="{{ asset('storage/'.$produk->foto) }}"
             width="220"
             class="rounded mb-4">

        @endif

        <table class="table">

            <tr>
                <th>Kode</th>
                <td>{{ $produk->kode_produk }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $produk->nama_produk }}</td>
            </tr>

            <tr>
                <th>Kategori</th>
                <td>{{ $produk->kategori->nama_kategori }}</td>
            </tr>

            <tr>
                <th>Harga</th>
                <td>Rp {{ number_format($produk->harga,0,',','.') }}</td>
            </tr>

            <tr>
                <th>Stok</th>
                <td>{{ $produk->stok }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $produk->deskripsi }}</td>
            </tr>

        </table>

        <a href="{{ route('produk.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection