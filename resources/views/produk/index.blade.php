@extends('layouts.app')

@section('title', 'Produk')
@section('page_title', 'Data Produk')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-box me-2 text-primary"></i>Daftar Produk</span>
            <a href="{{ route('produk.create') }}" class="btn btn-gradient-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th class="text-end">Harga Beli</th>
                            <th class="text-end">Harga Jual</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">ROP</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $d->nama_produk }}</td>
                                <td><span class="badge bg-light text-dark">{{ $d->kategori->nama_kategori ?? '-' }}</span></td>
                                <td>{{ $d->satuan->nama_satuan ?? '-' }}</td>
                                <td class="text-end">Rp {{ number_format($d->harga_beli, 0, ',', '.') }}</td>
                                <td class="text-end">Rp {{ number_format($d->harga_jual, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $d->stok <= $d->reorder_point ? 'bg-danger' : 'bg-success' }} rounded-pill">
                                        {{ $d->stok }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $d->reorder_point }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('produk.edit', $d->id_produk) }}" class="btn btn-gradient-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('produk.destroy', $d->id_produk) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk {{ $d->nama_produk }}?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="empty-state">
                                        <i class="bi bi-box"></i>
                                        <h6>Belum ada data produk</h6>
                                        <a href="{{ route('produk.create') }}" class="btn btn-gradient-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Produk
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