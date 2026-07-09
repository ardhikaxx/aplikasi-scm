@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card text-white gradient-1">
                <div class="card-body">
                    <i class="bi bi-truck icon-bg"></i>
                    <p class="stat-label"><i class="bi bi-truck me-1"></i>Total Supplier</p>
                    <p class="stat-number">{{ $supplier }}</p>
                    <small><i class="bi bi-building me-1"></i>Supplier terdaftar</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card text-white gradient-2">
                <div class="card-body">
                    <i class="bi bi-box icon-bg"></i>
                    <p class="stat-label"><i class="bi bi-box me-1"></i>Total Produk</p>
                    <p class="stat-number">{{ $produk }}</p>
                    <small><i class="bi bi-archive me-1"></i>Produk tersedia</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card text-white gradient-3">
                <div class="card-body">
                    <i class="bi bi-cart-plus icon-bg"></i>
                    <p class="stat-label"><i class="bi bi-cart-plus me-1"></i>Purchase Order</p>
                    <p class="stat-number">{{ $po }}</p>
                    <small><i class="bi bi-clipboard me-1"></i>Total PO</small>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card text-white gradient-4">
                <div class="card-body">
                    <i class="bi bi-boxes icon-bg"></i>
                    <p class="stat-label"><i class="bi bi-boxes me-1"></i>Total Stok</p>
                    <p class="stat-number">{{ number_format($stok, 0, ',', '.') }}</p>
                    <small><i class="bi bi-graph-up me-1"></i>Stok keseluruhan</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-header d-flex align-items-center">
            <i class="bi bi-info-circle me-2 text-primary"></i>
            Selamat Datang di Sistem Manajemen Rantai Pasokan
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="label"><i class="bi bi-truck me-1"></i>Supplier Aktif</div>
                        <div class="value">{{ $supplier }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="label"><i class="bi bi-box me-1"></i>Total Produk</div>
                        <div class="value">{{ $produk }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="label"><i class="bi bi-cart-plus me-1"></i>Purchase Order</div>
                        <div class="value">{{ $po }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="summary-card">
                        <div class="label"><i class="bi bi-boxes me-1"></i>Total Stok</div>
                        <div class="value">{{ number_format($stok, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection