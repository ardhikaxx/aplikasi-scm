@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Detail Sales Order (ID: {{ $idSo }})</h2>
        <div>
            <a href="{{ route('detail_so.create', $idSo) }}" class="btn btn-primary">Tambah Detail</a>
            <a href="{{ route('sales_order.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($details as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_produk }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>
                            <a href="{{ route('detail_so.edit', [$idSo, $d->id_detail]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('detail_so.destroy', [$idSo, $d->id_detail]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
