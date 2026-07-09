@extends('layouts.app')

@section('title', 'Edit Mutasi Stok')
@section('page_title', 'Edit Mutasi Stok')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-arrow-left-right me-2 text-primary"></i>Form Edit Mutasi Stok</span>
            <a href="{{ route('mutasi.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('mutasi.update', $mutasi->id_mutasi) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $mutasi->tanggal) }}">
                        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="nama_produk" class="form-label fw-medium">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk"
                            class="form-control form-custom @error('nama_produk') is-invalid @enderror"
                            value="{{ old('nama_produk', $mutasi->nama_produk) }}">
                        @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_mutasi" class="form-label fw-medium">Jenis Mutasi</label>
                        <select name="jenis_mutasi" id="jenis_mutasi"
                            class="form-select form-custom @error('jenis_mutasi') is-invalid @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Masuk" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                            <option value="Keluar" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                        </select>
                        @error('jenis_mutasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah" class="form-label fw-medium">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah', $mutasi->jumlah) }}" step="any">
                        @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-8">
                        <label for="keterangan" class="form-label fw-medium">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="2"
                            class="form-control form-custom @error('keterangan') is-invalid @enderror">{{ old('keterangan', $mutasi->keterangan) }}</textarea>
                        @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('mutasi.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection