@extends('layouts.app')

@section('title', 'Laporan Purchase Order')
@section('page_title', 'Laporan Purchase Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-cart-plus me-2 text-primary"></i>Data Purchase Order</span>
            <button onclick="window.print()" class="btn btn-gradient-primary btn-sm">
                <i class="bi bi-printer me-1"></i>Cetak
            </button>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchaseOrders as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $d->supplier->nama_supplier ?? '-' }}</td>
                                <td class="text-end fw-semibold">Rp {{ number_format($d->total, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="bi bi-cart-plus"></i>
                                        <h6>Tidak ada data</h6>
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