@extends('layouts.app')

@section('title', 'Tambah Supplier')
@section('page_title', 'Tambah Supplier')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-truck me-2 text-primary"></i>Form Tambah Supplier</span>
            <a href="{{ route('supplier.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama_supplier" class="form-label fw-medium">Nama Supplier</label>
                        <input type="text" name="nama_supplier" id="nama_supplier"
                            class="form-control form-custom @error('nama_supplier') is-invalid @enderror"
                            value="{{ old('nama_supplier') }}" required placeholder="Masukkan nama supplier">
                        @error('nama_supplier')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="telepon" class="form-label fw-medium">Telepon</label>
                        <input type="text" name="telepon" id="telepon"
                            class="form-control form-custom @error('telepon') is-invalid @enderror"
                            value="{{ old('telepon') }}" placeholder="Masukkan nomor telepon">
                        @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control form-custom @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Masukkan alamat email">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label for="alamat" class="form-label fw-medium">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="form-control form-custom @error('alamat') is-invalid @enderror"
                            placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection