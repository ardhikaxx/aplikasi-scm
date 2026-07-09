@extends('layouts.app')

@section('title', 'Detail Penerimaan')
@section('page_title', 'Detail Penerimaan Barang')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-receipt me-2 text-primary"></i>Detail Penerimaan (ID: {{ $idPenerimaan }})</span>
            <div class="d-flex gap-2">
                <a href="{{ route('detail_penerimaan.create', $idPenerimaan) }}" class="btn btn-gradient-success btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Detail
                </a>
                <a href="{{ route('penerimaan_barang.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Produk</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end">Subtotal</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $d->produk->nama_produk ?? $d->id_produk }}</td>
                                <td class="text-center">{{ number_format($d->jumlah, 0, ',', '.') }}</td>
                                <td class="text-end">Rp {{ number_format($d->harga, 2, ',', '.') }}</td>
                                <td class="text-end fw-semibold">Rp {{ number_format($d->jumlah * $d->harga, 2, ',', '.') }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('detail_penerimaan.edit', [$idPenerimaan, $d->id_detail]) }}" class="btn btn-gradient-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('detail_penerimaan.destroy', [$idPenerimaan, $d->id_detail]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-receipt"></i>
                                        <h6>Belum ada detail penerimaan</h6>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection