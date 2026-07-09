@extends('layouts.app')

@section('title', 'Laporan')
@section('page_title', 'Laporan')

@section('content')
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.purchase_order') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-cart-plus display-3 text-primary"></i>
                        <h5 class="mt-3 fw-semibold">Purchase Order</h5>
                        <p class="text-muted small mb-0">Laporan data purchase order</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.penerimaan_barang') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-arrow-down-circle display-3 text-success"></i>
                        <h5 class="mt-3 fw-semibold">Penerimaan Barang</h5>
                        <p class="text-muted small mb-0">Laporan data penerimaan barang</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.sales_order') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-cart-check display-3 text-warning"></i>
                        <h5 class="mt-3 fw-semibold">Sales Order</h5>
                        <p class="text-muted small mb-0">Laporan data sales order</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.mutasi') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <i class="bi bi-arrow-left-right display-3 text-info"></i>
                        <h5 class="mt-3 fw-semibold">Mutasi Stok</h5>
                        <p class="text-muted small mb-0">Laporan data mutasi stok</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection