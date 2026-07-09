@extends('layouts.app')

@section('title', 'Tambah Satuan')
@section('page_title', 'Tambah Satuan')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-rulers me-2 text-primary"></i>Form Tambah Satuan</span>
            <a href="{{ route('satuan.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('satuan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="nama_satuan" class="form-label fw-medium">
                            <i class="bi bi-pencil-square text-primary me-1"></i>Nama Satuan
                        </label>
                        <input type="text" name="nama_satuan" id="nama_satuan"
                            class="form-control form-custom @error('nama_satuan') is-invalid @enderror"
                            value="{{ old('nama_satuan') }}" required placeholder="Contoh: kg, pcs, liter">
                        @error('nama_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('satuan.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection