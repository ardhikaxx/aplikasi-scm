@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Supplier</h2>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($supplier as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_supplier }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->telepon }}</td>
                        <td>{{ $d->email }}</td>
                        <td>
                            <a href="{{ route('supplier.edit', $d->id_supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('supplier.destroy', $d->id_supplier) }}" method="POST" class="d-inline">
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
