@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Mutasi Stok</h2>
        <a href="{{ route('mutasi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('mutasi.update', $mutasi->id_mutasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $mutasi->tanggal) }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $mutasi->nama_produk) }}">
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_mutasi" class="form-label">Jenis Mutasi</label>
            <select name="jenis_mutasi" id="jenis_mutasi" class="form-select @error('jenis_mutasi') is-invalid @enderror">
                <option value="">-- Pilih Jenis --</option>
                <option value="Masuk" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="Keluar" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
            @error('jenis_mutasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $mutasi->jumlah) }}" step="any">
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $mutasi->keterangan) }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
