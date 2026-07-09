@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Produk</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Reorder Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_produk }}</td>
                        <td>{{ $d->kategori->nama_kategori }}</td>
                        <td>{{ $d->satuan->nama_satuan }}</td>
                        <td>{{ number_format($d->harga_beli, 0, ',', '.') }}</td>
                        <td>{{ number_format($d->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $d->stok }}</td>
                        <td>{{ $d->reorder_point }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $d->id_produk) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('produk.destroy', $d->id_produk) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
