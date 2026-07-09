@extends('layouts.app')

@section('title', 'Laporan')
@section('page_title', 'Laporan')

@section('content')
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.purchase_order') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <div class="icon-box bg-soft-primary mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                            <i class="bi bi-cart-plus"></i>
                        </div>
                        <h5 class="fw-semibold">Purchase Order</h5>
                        <p class="text-muted small mb-0">Laporan data purchase order</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.penerimaan_barang') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <div class="icon-box bg-soft-success mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                            <i class="bi bi-arrow-down-circle"></i>
                        </div>
                        <h5 class="fw-semibold">Penerimaan Barang</h5>
                        <p class="text-muted small mb-0">Laporan data penerimaan barang</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.sales_order') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <div class="icon-box bg-soft-warning mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h5 class="fw-semibold">Sales Order</h5>
                        <p class="text-muted small mb-0">Laporan data sales order</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('laporan.mutasi') }}" class="text-decoration-none">
                <div class="card card-custom text-center h-100">
                    <div class="card-body py-5">
                        <div class="icon-box bg-soft-info mx-auto mb-3" style="width: 56px; height: 56px; font-size: 1.5rem;">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>
                        <h5 class="fw-semibold">Mutasi Stok</h5>
                        <p class="text-muted small mb-0">Laporan data mutasi stok</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection