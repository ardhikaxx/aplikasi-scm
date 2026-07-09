@extends('layouts.app')

@section('title', 'Tambah Mutasi Stok')
@section('page_title', 'Tambah Mutasi Stok')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-arrow-left-right me-2 text-primary"></i>Form Tambah Mutasi Stok</span>
            <a href="{{ route('mutasi.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('mutasi.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">
                            <i class="bi bi-calendar text-primary me-1"></i>Tanggal
                        </label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal') }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="nama_produk" class="form-label fw-medium">
                            <i class="bi bi-box text-primary me-1"></i>Nama Produk
                        </label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="form-control form-custom @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk') }}" placeholder="Masukkan nama produk">
                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_mutasi" class="form-label fw-medium">
                            <i class="bi bi-arrow-left-right text-primary me-1"></i>Jenis Mutasi
                        </label>
                        <select name="jenis_mutasi" id="jenis_mutasi"
                            class="form-select form-custom @error('jenis_mutasi') is-invalid @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Masuk" {{ old('jenis_mutasi') == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                            <option value="Keluar" {{ old('jenis_mutasi') == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                        </select>
                        @error('jenis_mutasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah" class="form-label fw-medium">
                            <i class="bi bi-123 text-primary me-1"></i>Jumlah
                        </label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah') }}" step="any" placeholder="0">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="keterangan" class="form-label fw-medium">
                            <i class="bi bi-chat-text text-primary me-1"></i>Keterangan
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="2"
                            class="form-control form-custom @error('keterangan') is-invalid @enderror"
                            placeholder="Opsional">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('mutasi.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection