@extends('layouts.app')

@section('title', 'Laporan Mutasi')
@section('page_title', 'Laporan Mutasi Stok')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-arrow-left-right me-2 text-primary"></i>Data Mutasi Stok</span>
            <button onclick="window.print()" class="btn btn-gradient-primary btn-sm">
                <i class="bi bi-printer me-1"></i>Cetak
            </button>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mutasis as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td class="fw-medium">{{ $d->produk->nama_produk ?? $d->nama_produk }}</td>
                                <td>
                                    @if($d->jenis_mutasi == 'Masuk')
                                        <span class="badge-status bg-success text-white"><i class="bi bi-arrow-down me-1"></i>Masuk</span>
                                    @else
                                        <span class="badge-status bg-danger text-white"><i class="bi bi-arrow-up me-1"></i>Keluar</span>
                                    @endif
                                </td>
                                <td class="text-end fw-semibold">{{ number_format($d->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $d->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="bi bi-arrow-left-right"></i>
                                        <h6>Tidak ada data</h6>
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