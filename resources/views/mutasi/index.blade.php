@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Mutasi Stok</h2>
        <a href="{{ route('mutasi.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jenis Mutasi</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mutasis as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->nama_produk }}</td>
                        <td>{{ $d->jenis_mutasi }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>
                            <a href="{{ route('mutasi.edit', $d->id_mutasi) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('mutasi.destroy', $d->id_mutasi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
