@extends('layouts.app')

@section('title', 'Edit Purchase Order')
@section('page_title', 'Edit Purchase Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-cart-plus me-2 text-primary"></i>Form Edit Purchase Order</span>
            <a href="{{ route('purchase_order.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('purchase_order.update', $purchaseOrder->id_po) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">
                            <i class="bi bi-calendar text-primary me-1"></i>Tanggal
                        </label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $purchaseOrder->tanggal) }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="id_supplier" class="form-label fw-medium">
                            <i class="bi bi-truck text-primary me-1"></i>Supplier
                        </label>
                        <select name="id_supplier" id="id_supplier"
                            class="form-select form-custom @error('id_supplier') is-invalid @enderror">
                            <option value="">-- Pilih Supplier --</option>
                            @foreach ($suppliers as $s)
                                <option value="{{ $s->id_supplier }}" {{ old('id_supplier', $purchaseOrder->id_supplier) == $s->id_supplier ? 'selected' : '' }}>{{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                        @error('id_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="total" class="form-label fw-medium">
                            <i class="bi bi-cash text-primary me-1"></i>Total
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="total" id="total"
                                class="form-control form-custom @error('total') is-invalid @enderror"
                                value="{{ old('total', $purchaseOrder->total) }}">
                        </div>
                        @error('total')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('purchase_order.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection