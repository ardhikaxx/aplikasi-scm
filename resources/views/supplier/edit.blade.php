@extends('layouts.app')

@section('title', 'Edit Supplier')
@section('page_title', 'Edit Supplier')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-truck me-2 text-primary"></i>Form Edit Supplier</span>
            <a href="{{ route('supplier.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nama_supplier" class="form-label fw-medium">
                            <i class="bi bi-building text-primary me-1"></i>Nama Supplier
                        </label>
                        <input type="text" name="nama_supplier" id="nama_supplier"
                            class="form-control form-custom @error('nama_supplier') is-invalid @enderror"
                            value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                        @error('nama_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="telepon" class="form-label fw-medium">
                            <i class="bi bi-telephone text-primary me-1"></i>Telepon
                        </label>
                        <input type="text" name="telepon" id="telepon"
                            class="form-control form-custom @error('telepon') is-invalid @enderror"
                            value="{{ old('telepon', $supplier->telepon) }}">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium">
                            <i class="bi bi-envelope text-primary me-1"></i>Email
                        </label>
                        <input type="email" name="email" id="email"
                            class="form-control form-custom @error('email') is-invalid @enderror"
                            value="{{ old('email', $supplier->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="alamat" class="form-label fw-medium">
                            <i class="bi bi-geo-alt text-primary me-1"></i>Alamat
                        </label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="form-control form-custom @error('alamat') is-invalid @enderror">{{ old('alamat', $supplier->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection