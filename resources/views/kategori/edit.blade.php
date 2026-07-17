@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">

        <h4>Edit Kategori</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    value="{{ old('nama_kategori',$kategori->nama_kategori) }}"
                    class="form-control @error('nama_kategori') is-invalid @enderror">

                @error('nama_kategori')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <button class="btn btn-success">

                Update

            </button>

            <a href="{{ route('kategori.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection