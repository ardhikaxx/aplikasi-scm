@extends('layouts.app')

@section('title', 'Edit Produk')
@section('page_title', 'Edit Produk')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-box me-2 text-primary"></i>Form Edit Produk</span>
            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label fw-medium">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="form-control form-custom @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk', $produk->nama_produk) }}">
                        @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="id_kategori" class="form-label fw-medium">Kategori</label>
                        <select name="id_kategori" id="id_kategori"
                            class="form-select form-custom @error('id_kategori') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($kategoris as $k)
                                <option value="{{ $k->id_kategori }}" {{ old('id_kategori', $produk->id_kategori) == $k->id_kategori ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="id_satuan" class="form-label fw-medium">Satuan</label>
                        <select name="id_satuan" id="id_satuan"
                            class="form-select form-custom @error('id_satuan') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach ($satuans as $s)
                                <option value="{{ $s->id_satuan }}" {{ old('id_satuan', $produk->id_satuan) == $s->id_satuan ? 'selected' : '' }}>{{ $s->nama_satuan }}</option>
                            @endforeach
                        </select>
                        @error('id_satuan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga_beli" class="form-label fw-medium">Harga Beli</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga_beli" id="harga_beli"
                                class="form-control form-custom @error('harga_beli') is-invalid @enderror"
                                value="{{ old('harga_beli', $produk->harga_beli) }}">
                        </div>
                        @error('harga_beli')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga_jual" class="form-label fw-medium">Harga Jual</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga_jual" id="harga_jual"
                                class="form-control form-custom @error('harga_jual') is-invalid @enderror"
                                value="{{ old('harga_jual', $produk->harga_jual) }}">
                        </div>
                        @error('harga_jual')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="stok" class="form-label fw-medium">Stok</label>
                        <input type="number" name="stok" id="stok"
                            class="form-control form-custom @error('stok') is-invalid @enderror"
                            value="{{ old('stok', $produk->stok) }}">
                        @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="reorder_point" class="form-label fw-medium">Reorder Point</label>
                        <input type="number" name="reorder_point" id="reorder_point"
                            class="form-control form-custom @error('reorder_point') is-invalid @enderror"
                            value="{{ old('reorder_point', $produk->reorder_point) }}">
                        @error('reorder_point')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection