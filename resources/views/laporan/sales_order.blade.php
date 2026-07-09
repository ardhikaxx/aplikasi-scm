@extends('layouts.app')

@section('title', 'Laporan Sales Order')
@section('page_title', 'Laporan Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-cart-check me-2 text-primary"></i>Data Sales Order</span>
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
                            <th>Customer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salesOrders as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td class="fw-medium">{{ $d->nama_customer }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($d->status) {
                                            'Pending' => 'bg-warning',
                                            'Diproses' => 'bg-info',
                                            'Selesai' => 'bg-success',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge-status {{ $badgeClass }} text-white">{{ $d->status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="bi bi-cart-check"></i>
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