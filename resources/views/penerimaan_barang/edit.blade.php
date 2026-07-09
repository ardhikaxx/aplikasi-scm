@extends('layouts.app')

@section('title', 'Edit Penerimaan Barang')
@section('page_title', 'Edit Penerimaan Barang')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-arrow-down-circle me-2 text-primary"></i>Form Edit Penerimaan Barang</span>
            <a href="{{ route('penerimaan_barang.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('penerimaan_barang.update', $penerimaanBarang->id_penerimaan) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="id_po" class="form-label fw-medium">No Purchase Order</label>
                        <select name="id_po" id="id_po"
                            class="form-select form-custom @error('id_po') is-invalid @enderror">
                            <option value="">-- Pilih PO --</option>
                            @foreach ($pos as $po)
                                <option value="{{ $po->id_po }}" {{ old('id_po', $penerimaanBarang->id_po) == $po->id_po ? 'selected' : '' }}>PO-{{ $po->id_po }}</option>
                            @endforeach
                        </select>
                        @error('id_po')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal" class="form-label fw-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control form-custom @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $penerimaanBarang->tanggal) }}">
                        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="keterangan" class="form-label fw-medium">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="1"
                            class="form-control form-custom @error('keterangan') is-invalid @enderror">{{ old('keterangan', $penerimaanBarang->keterangan) }}</textarea>
                        @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <hr class="my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                    <a href="{{ route('penerimaan_barang.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection