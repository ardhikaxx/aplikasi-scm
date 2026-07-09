@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Dashboard</h2>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Supplier</h5>
                    <p class="card-text fs-3">{{ $supplier }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text fs-3">{{ $produk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Purchase Order</h5>
                    <p class="card-text fs-3">{{ $po }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Stok</h5>
                    <p class="card-text fs-3">{{ $stok }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
