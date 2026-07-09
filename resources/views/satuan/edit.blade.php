@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Satuan</h2>
        <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('satuan.update', $satuan->id_satuan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_satuan" class="form-label">Nama Satuan</label>
            <input type="text" name="nama_satuan" id="nama_satuan" class="form-control @error('nama_satuan') is-invalid @enderror" value="{{ old('nama_satuan', $satuan->nama_satuan) }}" required>
            @error('nama_satuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
