@extends('layouts.app')

@section('title', 'Sales Order')
@section('page_title', 'Data Sales Order')

@section('content')
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span><i class="bi bi-cart-check me-2 text-primary"></i>Daftar Sales Order</span>
            <a href="{{ route('sales_order.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah SO
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salesOrders as $d)
                            <tr>
                                <td class="fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d/m/Y') }}</td>
                                <td class="fw-medium">{{ $d->nama_customer }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($d->status) {
                                            'Pending' => 'badge-yellow',
                                            'Diproses' => 'badge-blue',
                                            'Selesai' => 'badge-green',
                                            default => 'badge-gray'
                                        };
                                    @endphp
                                    <span class="badge-status {{ $badgeClass }}">{{ $d->status }}</span>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('detail_so.index', $d->id_so) }}" class="btn btn-info btn-sm" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('sales_order.edit', $d->id_so) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('sales_order.destroy', $d->id_so) }}" method="POST" class="d-inline">
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
                                        <i class="bi bi-cart-check"></i>
                                        <h6>Belum ada data sales order</h6>
                                        <a href="{{ route('sales_order.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah SO
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