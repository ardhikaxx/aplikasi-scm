@extends('layouts.app')

@section('title', 'Purchase Order')
@section('page_title', 'Data Purchase Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-cart-plus me-2 text-primary"></i>Daftar Purchase Order</span>
            <a href="{{ route('purchase_order.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah PO
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th class="text-end">Total</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchaseOrders as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td class="fw-medium">{{ $d->supplier->nama_supplier ?? '-' }}</td>
                                <td class="text-end fw-semibold">Rp {{ number_format($d->total, 0, ',', '.') }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('purchase_order.edit', $d->id_po) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('purchase_order.destroy', $d->id_po) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus PO ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-cart-plus"></i>
                                        <h6>Belum ada data purchase order</h6>
                                        <a href="{{ route('purchase_order.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah PO
                                        </a>
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