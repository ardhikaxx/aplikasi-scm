<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Rantai Pasokan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4 class="text-center mb-4">SCM App</h4>
            <hr>
            <nav class="nav flex-column">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
                <a href="{{ route('supplier.index') }}" class="nav-link text-white">Supplier</a>
                <a href="{{ route('kategori.index') }}" class="nav-link text-white">Kategori</a>
                <a href="{{ route('satuan.index') }}" class="nav-link text-white">Satuan</a>
                <a href="{{ route('produk.index') }}" class="nav-link text-white">Produk</a>
                <a href="{{ route('purchase_order.index') }}" class="nav-link text-white">Purchase Order</a>
                <a href="{{ route('penerimaan_barang.index') }}" class="nav-link text-white">Penerimaan Barang</a>
                <a href="{{ route('sales_order.index') }}" class="nav-link text-white">Sales Order</a>
                <a href="{{ route('mutasi.index') }}" class="nav-link text-white">Mutasi Stok</a>
                <a href="{{ route('laporan.index') }}" class="nav-link text-white">Laporan</a>
            </nav>
        </div>
        <div class="container-fluid p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
