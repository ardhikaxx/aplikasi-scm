@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page_title', 'Edit Kategori')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-tags me-2 text-primary"></i>Form Edit Kategori</span>
            <a href="{{ route('kategori.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="nama_kategori" class="form-label fw-medium">
                            <i class="bi bi-tag text-primary me-1"></i>Nama Kategori
                        </label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            class="form-control form-custom @error('nama_kategori') is-invalid @enderror"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection