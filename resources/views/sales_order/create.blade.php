@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tambah Sales Order</h2>
        <a href="{{ route('sales_order.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('sales_order.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_customer" class="form-label">Nama Customer</label>
            <input type="text" name="nama_customer" id="nama_customer" class="form-control @error('nama_customer') is-invalid @enderror" value="{{ old('nama_customer') }}">
            @error('nama_customer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="">-- Pilih Status --</option>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
