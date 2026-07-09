@extends('layouts.app')

@section('title', 'Penerimaan Barang')
@section('page_title', 'Data Penerimaan Barang')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-arrow-down-circle me-2 text-primary"></i>Daftar Penerimaan Barang</span>
            <a href="{{ route('penerimaan_barang.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Penerimaan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>No PO</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerimaanBarangs as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td><span class="badge badge-blue">PO-{{ $d->purchaseOrder->id_po ?? $d->id_po }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $d->keterangan ?? '-' }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('detail_penerimaan.index', $d->id_penerimaan) }}" class="btn btn-info btn-sm" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('penerimaan_barang.edit', $d->id_penerimaan) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('penerimaan_barang.destroy', $d->id_penerimaan) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-arrow-down-circle"></i>
                                        <h6>Belum ada data penerimaan barang</h6>
                                        <a href="{{ route('penerimaan_barang.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Penerimaan
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