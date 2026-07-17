@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-0">Data Kategori</h2>
        <small class="text-muted">
            Kelola kategori produk toko
        </small>
    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>

</div>

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button class="btn-close" data-bs-dismiss="alert"></button>

</div>

@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

            <tr>

                <th width="70">No</th>

                <th>Nama Kategori</th>

                <th width="200">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @forelse($kategoris as $kategori)

                <tr>

                    <td>
                        {{ $loop->iteration + ($kategoris->currentPage()-1) * $kategoris->perPage() }}
                    </td>

                    <td>

                        <strong>{{ $kategori->nama_kategori }}</strong>

                    </td>

                    <td>

                        <a href="{{ route('kategori.edit',$kategori->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('kategori.destroy',$kategori->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center text-muted">

                        Belum ada data kategori.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $kategoris->links() }}

        </div>

    </div>

</div>

@endsection