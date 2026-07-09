@extends('layouts.app')

@section('title', 'Tambah Detail Sales Order')
@section('page_title', 'Tambah Detail Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-plus-circle me-2 text-primary"></i>Form Tambah Detail Sales Order</span>
            <a href="{{ route('detail_so.index', $idSo) }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('detail_so.store', $idSo) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label fw-medium">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="form-control form-custom @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk') }}" placeholder="Masukkan nama produk">
                        @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah" class="form-label fw-medium">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah') }}" step="any" placeholder="0">
                        @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('detail_so.index', $idSo) }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection