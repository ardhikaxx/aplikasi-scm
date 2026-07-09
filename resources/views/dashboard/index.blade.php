@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card" style="border-left: 4px solid #2563eb;">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="icon-box bg-soft-primary">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Supplier</div>
                        <div class="stat-number">{{ $supplier }}</div>
                        <div class="stat-footer">Supplier terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card" style="border-left: 4px solid #059669;">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="icon-box bg-soft-success">
                        <i class="bi bi-box"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Produk</div>
                        <div class="stat-number">{{ $produk }}</div>
                        <div class="stat-footer">Produk tersedia</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card" style="border-left: 4px solid #d97706;">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="icon-box bg-soft-warning">
                        <i class="bi bi-cart-plus"></i>
                    </div>
                    <div>
                        <div class="stat-label">Purchase Order</div>
                        <div class="stat-number">{{ $po }}</div>
                        <div class="stat-footer">Total PO</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card" style="border-left: 4px solid #0891b2;">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="icon-box bg-soft-info">
                        <i class="bi bi-boxes"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Stok</div>
                        <div class="stat-number">{{ number_format($stok, 0, ',', '.') }}</div>
                        <div class="stat-footer">Stok keseluruhan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="bi bi-info-circle"></i>
            <span>Selamat Datang di Sistem Manajemen Rantai Pasokan</span>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-light text-center">
                        <i class="bi bi-truck fs-4 text-primary mb-2 d-block"></i>
                        <div class="fw-bold fs-5">{{ $supplier }}</div>
                        <div class="small text-muted">Supplier</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-light text-center">
                        <i class="bi bi-box fs-4 text-success mb-2 d-block"></i>
                        <div class="fw-bold fs-5">{{ $produk }}</div>
                        <div class="small text-muted">Produk</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-light text-center">
                        <i class="bi bi-cart-plus fs-4 text-warning mb-2 d-block"></i>
                        <div class="fw-bold fs-5">{{ $po }}</div>
                        <div class="small text-muted">PO</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-light text-center">
                        <i class="bi bi-boxes fs-4 text-info mb-2 d-block"></i>
                        <div class="fw-bold fs-5">{{ number_format($stok, 0, ',', '.') }}</div>
                        <div class="small text-muted">Stok</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection