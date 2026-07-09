@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Laporan</h2>
    </div>
    <div class="list-group">
        <a href="{{ route('laporan.purchase_order') }}" class="list-group-item list-group-item-action">
            Laporan Purchase Order
        </a>
        <a href="{{ route('laporan.penerimaan_barang') }}" class="list-group-item list-group-item-action">
            Laporan Penerimaan Barang
        </a>
        <a href="{{ route('laporan.sales_order') }}" class="list-group-item list-group-item-action">
            Laporan Sales Order
        </a>
        <a href="{{ route('laporan.mutasi') }}" class="list-group-item list-group-item-action">
            Laporan Mutasi
        </a>
    </div>
@endsection
