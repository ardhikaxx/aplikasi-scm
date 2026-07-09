@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Penerimaan Barang</h2>
        <a href="{{ route('penerimaan_barang.create') }}" class="btn btn-primary">Tambah Penerimaan</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>No PO</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penerimaanBarangs as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->purchaseOrder->id_po }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>
                            <a href="{{ route('detail_penerimaan.index', $d->id_penerimaan) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('penerimaan_barang.edit', $d->id_penerimaan) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('penerimaan_barang.destroy', $d->id_penerimaan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data penerimaan barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
