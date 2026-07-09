@extends('layouts.app')

@section('title', 'Supplier')
@section('page_title', 'Data Supplier')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-truck me-2 text-primary"></i>Daftar Supplier</span>
            <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Supplier
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supplier as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $d->nama_supplier }}</td>
                                <td>{{ $d->alamat ?? '-' }}</td>
                                <td>{{ $d->telepon ?? '-' }}</td>
                                <td>{{ $d->email ?? '-' }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('supplier.edit', $d->id_supplier) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('supplier.destroy', $d->id_supplier) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus supplier {{ $d->nama_supplier }}?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-truck"></i>
                                        <h6>Belum ada data supplier</h6>
                                        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Supplier
                                        </a>
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