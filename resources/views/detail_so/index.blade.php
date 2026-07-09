@extends('layouts.app')

@section('title', 'Detail Sales Order')
@section('page_title', 'Detail Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-receipt me-2 text-primary"></i>Detail Sales Order (ID: {{ $idSo }})</span>
            <div class="d-flex gap-2">
                <a href="{{ route('detail_so.create', $idSo) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Detail
                </a>
                <a href="{{ route('sales_order.index') }}" class="btn btn-outline-secondary btn-sm">
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
                            <th>Nama Produk</th>
                            <th class="text-center">Jumlah</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $d->nama_produk }}</td>
                                <td class="text-center">{{ number_format($d->jumlah, 0, ',', '.') }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('detail_so.edit', [$idSo, $d->id_detail]) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('detail_so.destroy', [$idSo, $d->id_detail]) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="bi bi-receipt"></i>
                                        <h6>Belum ada detail sales order</h6>
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