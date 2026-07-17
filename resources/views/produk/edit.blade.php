@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Edit Produk</h2>
        <small class="text-muted">Perbarui data produk</small>
    </div>

    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('produk.update', $produk->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Kode Produk</label>

                    <input
                        type="text"
                        name="kode_produk"
                        class="form-control @error('kode_produk') is-invalid @enderror"
                        value="{{ old('kode_produk', $produk->kode_produk) }}">

                    @error('kode_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Kategori</label>

                    <select
                        name="kategori_id"
                        class="form-select @error('kategori_id') is-invalid @enderror">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategoris as $kategori)

                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_id', $produk->kategori_id) == $kategori->id ? 'selected' : '' }}>

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">Nama Produk</label>

                <input
                    type="text"
                    name="nama_produk"
                    class="form-control @error('nama_produk') is-invalid @enderror"
                    value="{{ old('nama_produk', $produk->nama_produk) }}">

                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Harga</label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control @error('harga') is-invalid @enderror"
                        value="{{ old('harga', $produk->harga) }}">

                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Stok</label>

                    <input
                        type="number"
                        name="stok"
                        class="form-control @error('stok') is-invalid @enderror"
                        value="{{ old('stok', $produk->stok) }}">

                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label">Foto Produk</label>

                @if($produk->foto)

                    <div class="mb-3">

                        <img
                            src="{{ asset('storage/'.$produk->foto) }}"
                            id="preview"
                            class="img-thumbnail"
                            style="width:180px;">

                    </div>

                @else

                    <img
                        id="preview"
                        class="img-thumbnail mb-3"
                        style="width:180px;display:none;">

                @endif

                <input
                    type="file"
                    class="form-control @error('foto') is-invalid @enderror"
                    name="foto"
                    id="foto">

                <small class="text-muted">

                    Kosongkan jika tidak ingin mengganti foto.

                </small>

                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-primary">

                    💾 Update Produk

                </button>

                <a href="{{ route('produk.index') }}"
                   class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('foto').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        let preview = document.getElementById('preview');

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';

    }

});

</script>

@endsection