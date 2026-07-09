@extends('layouts.app')

@section('title', 'Edit Detail Sales Order')
@section('page_title', 'Edit Detail Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-pencil-square me-2 text-primary"></i>Form Edit Detail Sales Order</span>
            <a href="{{ route('detail_so.index', $idSo) }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('detail_so.update', [$idSo, $detail->id_detail]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nama_produk" class="form-label fw-medium">
                            <i class="bi bi-box text-primary me-1"></i>Nama Produk
                        </label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="form-control form-custom @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk', $detail->nama_produk) }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah" class="form-label fw-medium">
                            <i class="bi bi-123 text-primary me-1"></i>Jumlah
                        </label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah', $detail->jumlah) }}" step="any">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('detail_so.index', $idSo) }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection