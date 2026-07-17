@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Tambah Produk</h2>
        <small class="text-muted">Tambahkan produk baru ke toko</small>
    </div>

    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('produk.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Kode Produk</label>

                    <input type="text"
                           name="kode_produk"
                           class="form-control @error('kode_produk') is-invalid @enderror"
                           value="{{ old('kode_produk') }}">

                    @error('kode_produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Kategori</label>

                    <select name="kategori_id"
                            class="form-select @error('kategori_id') is-invalid @enderror">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategoris as $kategori)

                            <option value="{{ $kategori->id }}">

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

                <input type="text"
                       name="nama_produk"
                       class="form-control @error('nama_produk') is-invalid @enderror"
                       value="{{ old('nama_produk') }}">

                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control @error('harga') is-invalid @enderror"
                           value="{{ old('harga') }}">

                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Stok</label>

                    <input type="number"
                           name="stok"
                           class="form-control @error('stok') is-invalid @enderror"
                           value="{{ old('stok',0) }}">

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
                    class="form-control">{{ old('deskripsi') }}</textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">Foto Produk</label>

                <input type="file"
                       class="form-control"
                       name="foto"
                       id="foto">

                <img id="preview"
                     class="mt-3 rounded border"
                     width="180"
                     style="display:none;">

            </div>

            <button class="btn btn-primary">

                Simpan Produk

            </button>

        </form>

    </div>

</div>

<script>

document.getElementById('foto').addEventListener('change',function(e){

    const file=e.target.files[0];

    if(file){

        document.getElementById('preview').src=URL.createObjectURL(file);

        document.getElementById('preview').style.display='block';

    }

});

</script>

@endsection