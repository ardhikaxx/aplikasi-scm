@extends('layouts.app')

@section('title', 'Tambah Sales Order')
@section('page_title', 'Tambah Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-cart-check me-2 text-primary"></i>Form Tambah Sales Order</span>
            <a href="{{ route('sales_order.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('sales_order.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal') }}">
                        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="nama_customer" class="form-label fw-medium">Nama Customer</label>
                        <input type="text" name="nama_customer" id="nama_customer"
                            class="form-control form-custom @error('nama_customer') is-invalid @enderror"
                            value="{{ old('nama_customer') }}" placeholder="Masukkan nama customer">
                        @error('nama_customer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label fw-medium">Status</label>
                        <select name="status" id="status"
                            class="form-select form-custom @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('sales_order.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection