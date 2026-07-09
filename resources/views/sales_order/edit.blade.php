@extends('layouts.app')

@section('title', 'Edit Sales Order')
@section('page_title', 'Edit Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-cart-check me-2 text-primary"></i>Form Edit Sales Order</span>
            <a href="{{ route('sales_order.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('sales_order.update', $salesOrder->id_so) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">
                            <i class="bi bi-calendar text-primary me-1"></i>Tanggal
                        </label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $salesOrder->tanggal) }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="nama_customer" class="form-label fw-medium">
                            <i class="bi bi-person text-primary me-1"></i>Nama Customer
                        </label>
                        <input type="text" name="nama_customer" id="nama_customer"
                            class="form-control form-custom @error('nama_customer') is-invalid @enderror"
                            value="{{ old('nama_customer', $salesOrder->nama_customer) }}">
                        @error('nama_customer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label fw-medium">
                            <i class="bi bi-info-circle text-primary me-1"></i>Status
                        </label>
                        <select name="status" id="status"
                            class="form-select form-custom @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Pending" {{ old('status', $salesOrder->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diproses" {{ old('status', $salesOrder->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status', $salesOrder->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('sales_order.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection