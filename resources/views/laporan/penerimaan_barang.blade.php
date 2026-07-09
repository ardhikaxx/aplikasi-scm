@extends('layouts.app')

@section('title', 'Laporan Penerimaan Barang')
@section('page_title', 'Laporan Penerimaan Barang')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-arrow-down-circle me-2 text-primary"></i>Data Penerimaan Barang</span>
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
                            <th>No PO</th>
                            <th>Supplier</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerimaans as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td><span class="badge bg-light text-dark">PO-{{ $d->purchaseOrder->id_po ?? $d->id_po }}</span></td>
                                <td>{{ $d->purchaseOrder->supplier->nama_supplier ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $d->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-arrow-down-circle"></i>
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