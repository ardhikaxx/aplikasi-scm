@extends('layouts.app')

@section('title', 'Tambah Detail Penerimaan')
@section('page_title', 'Tambah Detail Penerimaan')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-plus-circle me-2 text-primary"></i>Form Tambah Detail (ID: {{ $idPenerimaan }})</span>
            <a href="{{ route('detail_penerimaan.index', $idPenerimaan) }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('detail_penerimaan.store', $idPenerimaan) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="id_produk" class="form-label fw-medium">Produk</label>
                        <select name="id_produk" id="id_produk"
                            class="form-select form-custom @error('id_produk') is-invalid @enderror">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produks as $p)
                                <option value="{{ $p->id_produk }}" {{ old('id_produk') == $p->id_produk ? 'selected' : '' }}>{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                        @error('id_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah" class="form-label fw-medium">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control form-custom @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah') }}" step="any" placeholder="0">
                        @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="harga" class="form-label fw-medium">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" id="harga"
                                class="form-control form-custom @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}" step="any" placeholder="0">
                        </div>
                        @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('detail_penerimaan.index', $idPenerimaan) }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection