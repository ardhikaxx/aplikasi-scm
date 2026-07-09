@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Purchase Order</h2>

    <form action="{{ route('purchase_order.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select name="id_supplier" id="id_supplier" class="form-select @error('id_supplier') is-invalid @enderror">
                <option value="">-- Pilih Supplier --</option>
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id_supplier }}" {{ old('id_supplier') == $s->id_supplier ? 'selected' : '' }}>{{ $s->nama_supplier }}</option>
                @endforeach
            </select>
            @error('id_supplier')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total') }}">
            @error('total')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('purchase_order.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
