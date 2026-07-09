@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Purchase Order</h2>
        <a href="{{ route('purchase_order.create') }}" class="btn btn-primary">Tambah PO</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchaseOrders as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->supplier->nama_supplier }}</td>
                        <td>{{ number_format($d->total, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('purchase_order.edit', $d->id_po) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('purchase_order.destroy', $d->id_po) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data purchase order.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
