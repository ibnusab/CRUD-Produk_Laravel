@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="d-flex justify-content-between mb-4">

    <div>

        <h2 class="fw-bold">

            Data Produk

        </h2>

        <small class="text-muted">

            Kelola seluruh produk toko

        </small>

    </div>

    <a href="{{ route('produk.create') }}"
       class="btn btn-primary">

        + Tambah Produk

    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    class="form-control"
                    name="search"
                    placeholder="Cari produk..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-2">

                <button class="btn btn-dark">

                    Cari

                </button>

            </div>

        </form>

        <table class="table table-hover">

            <thead class="table-dark">

            <tr>

                <th>Foto</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="170">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @forelse($produks as $produk)

            <tr>

                <td>

                    @if($produk->foto)

<img src="{{ Storage::url($produk->foto) }}"
     width="60"
     height="60"
     style="object-fit:cover;border-radius:8px;">

@else

<span class="text-muted">Tidak ada</span>

@endif

                </td>

                <td>

                    {{ $produk->kode_produk }}

                </td>

                <td>

                    {{ $produk->nama_produk }}

                </td>

                <td>

                    {{ $produk->kategori->nama_kategori }}

                </td>

                <td>

                    Rp {{ number_format($produk->harga,0,',','.') }}

                </td>

                <td>

                    {{ $produk->stok }}

                </td>

                <td>

    <a href="{{ route('produk.edit', $produk->id) }}"
       class="btn btn-warning btn-sm">

        Edit

    </a>

    <form action="{{ route('produk.destroy', $produk->id) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus produk ini?')">

            Hapus

        </button>

    </form>

</td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center">

                    Belum ada produk.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

        {{ $produks->links() }}

    </div>

</div>

@endsection