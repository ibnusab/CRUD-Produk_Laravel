@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">

        <h4>Tambah Kategori</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('kategori.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori') }}">

                @error('nama_kategori')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <button class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('kategori.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection