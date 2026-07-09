@extends('layouts.app')

@section('title', 'Satuan')
@section('page_title', 'Data Satuan')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-rulers me-2 text-primary"></i>Daftar Satuan</span>
            <a href="{{ route('satuan.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Satuan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Satuan</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($satuan as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $d->nama_satuan }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('satuan.edit', $d->id_satuan) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('satuan.destroy', $d->id_satuan) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus satuan {{ $d->nama_satuan }}?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="empty-state">
                                        <i class="bi bi-rulers"></i>
                                        <h6>Belum ada data satuan</h6>
                                        <a href="{{ route('satuan.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Satuan
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