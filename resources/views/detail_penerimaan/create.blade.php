@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tambah Detail Penerimaan (ID: {{ $idPenerimaan }})</h2>
        <a href="{{ route('detail_penerimaan.index', $idPenerimaan) }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('detail_penerimaan.store', $idPenerimaan) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_produk" class="form-label">Produk</label>
            <select name="id_produk" id="id_produk" class="form-select @error('id_produk') is-invalid @enderror">
                <option value="">-- Pilih Produk --</option>
                @foreach ($produks as $p)
                    <option value="{{ $p->id_produk }}" {{ old('id_produk') == $p->id_produk ? 'selected' : '' }}>{{ $p->nama_produk }}</option>
                @endforeach
            </select>
            @error('id_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" step="any">
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" step="any">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
