@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Detail Penerimaan (ID: {{ $idPenerimaan }})</h2>
        <div>
            <a href="{{ route('detail_penerimaan.create', $idPenerimaan) }}" class="btn btn-primary">Tambah Detail</a>
            <a href="{{ route('penerimaan_barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($details as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->produk->nama_produk ?? $d->id_produk }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>{{ number_format($d->harga, 2) }}</td>
                        <td>{{ number_format($d->jumlah * $d->harga, 2) }}</td>
                        <td>
                            <a href="{{ route('detail_penerimaan.edit', [$idPenerimaan, $d->id_detail]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('detail_penerimaan.destroy', [$idPenerimaan, $d->id_detail]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
