@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Laporan Penerimaan Barang</h2>
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>No PO</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penerimaans as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->purchaseOrder->no_po ?? '-' }}</td>
                        <td>{{ $d->purchaseOrder->supplier->nama_supplier ?? '-' }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
