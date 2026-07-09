@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Penerimaan Barang</h2>

    <form action="{{ route('penerimaan_barang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_po" class="form-label">No PO</label>
            <select name="id_po" id="id_po" class="form-select @error('id_po') is-invalid @enderror">
                <option value="">-- Pilih PO --</option>
                @foreach ($pos as $po)
                    <option value="{{ $po->id_po }}" {{ old('id_po') == $po->id_po ? 'selected' : '' }}>{{ $po->id_po }}</option>
                @endforeach
            </select>
            @error('id_po')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penerimaan_barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
