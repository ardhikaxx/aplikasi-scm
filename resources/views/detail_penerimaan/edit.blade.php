@extends('layouts.app')

@section('title', 'Edit Detail Penerimaan')
@section('page_title', 'Edit Detail Penerimaan')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-pencil-square me-2 text-primary"></i>Form Edit Detail Penerimaan</span>
            <a href="{{ route('detail_penerimaan.index', $idPenerimaan) }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('detail_penerimaan.update', [$idPenerimaan, $detail->id_detail]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="id_produk" class="form-label fw-medium">
                            <i class="bi bi-box text-primary me-1"></i>Produk
                        </label>
                        <select name="id_produk" id="id_produk"
                            class="form-select form-custom @error('id_produk') is-invalid @enderror">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produks as $p)
                                <option value="{{ $p->id_produk }}" {{ old('id_produk', $detail->id_produk) == $p->id_produk ? 'selected' : '' }}>{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                        @error('id_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah" class="form-label fw-medium">
                            <i class="bi bi-123 text-primary me-1"></i>Jumlah
                        </label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah', $detail->jumlah) }}" step="any">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga" class="form-label fw-medium">
                            <i class="bi bi-currency-dollar text-primary me-1"></i>Harga
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" id="harga"
                                class="form-control form-custom @error('harga') is-invalid @enderror"
                                value="{{ old('harga', $detail->harga) }}" step="any">
                        </div>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-gradient-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('detail_penerimaan.index', $idPenerimaan) }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection