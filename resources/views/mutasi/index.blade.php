@extends('layouts.app')

@section('title', 'Mutasi Stok')
@section('page_title', 'Data Mutasi Stok')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-arrow-left-right me-2 text-primary"></i>Daftar Mutasi Stok</span>
            <a href="{{ route('mutasi.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Mutasi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Jenis Mutasi</th>
                            <th class="text-end">Jumlah</th>
                            <th>Keterangan</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutasis as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td class="fw-medium">{{ $d->nama_produk }}</td>
                                <td>
                                    @if($d->jenis_mutasi == 'Masuk')
                                        <span class="badge-status badge-green"><i class="bi bi-arrow-down me-1"></i>Masuk</span>
                                    @else
                                        <span class="badge-status badge-red"><i class="bi bi-arrow-up me-1"></i>Keluar</span>
                                    @endif
                                </td>
                                <td class="text-end fw-semibold">{{ number_format($d->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $d->keterangan ?? '-' }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('mutasi.edit', $d->id_mutasi) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('mutasi.destroy', $d->id_mutasi) }}" method="POST" class="d-inline">
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
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="bi bi-arrow-left-right"></i>
                                        <h6>Belum ada data mutasi stok</h6>
                                        <a href="{{ route('mutasi.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Mutasi
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