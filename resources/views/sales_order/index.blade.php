@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sales Order</h2>
        <a href="{{ route('sales_order.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salesOrders as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->nama_customer }}</td>
                        <td>{{ $d->status }}</td>
                        <td>
                            <a href="{{ route('detail_so.index', $d->id_so) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('sales_order.edit', $d->id_so) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('sales_order.destroy', $d->id_so) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
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
