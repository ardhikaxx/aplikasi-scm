<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SCM App') - Manajemen Rantai Pasokan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s;
        }
        .sidebar-brand {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-brand h4 {
            color: #fff;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0;
        }
        .sidebar-brand small {
            color: rgba(255,255,255,0.5);
            font-size: 0.7rem;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.65);
            padding: 0.75rem 1.5rem;
            margin: 2px 0.5rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .nav-link i { font-size: 1.1rem; width: 22px; text-align: center; }
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.08);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 15px rgba(102,126,234,0.4);
        }
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 0;
        }
        .topbar {
            background: #fff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .topbar h5 {
            margin: 0;
            font-weight: 600;
            color: #1a1a2e;
        }
        .topbar .breadcrumb {
            margin: 0;
            background: none;
            font-size: 0.85rem;
        }
        .content-wrapper {
            padding: 1.5rem 2rem;
        }
        .stat-card {
            border: none;
            border-radius: 16px;
            transition: all 0.3s;
            overflow: hidden;
            position: relative;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .stat-card .card-body {
            padding: 1.5rem;
            position: relative;
            z-index: 1;
        }
        .stat-card .icon-bg {
            position: absolute;
            right: -10px;
            bottom: -10px;
            font-size: 5rem;
            opacity: 0.15;
            color: #fff;
        }
        .stat-card .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }
        .stat-card .stat-label {
            font-size: 0.85rem;
            opacity: 0.85;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: all 0.3s;
        }
        .card-custom:hover {
            box-shadow: 0 6px 24px rgba(0,0,0,0.1);
        }
        .card-custom .card-header {
            background: transparent;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.2rem 1.5rem;
            font-weight: 600;
        }
        .card-custom .card-body {
            padding: 1.5rem;
        }
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-custom thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            color: #495057;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.9rem 1rem;
        }
        .table-custom tbody tr {
            transition: all 0.2s;
        }
        .table-custom tbody tr:hover {
            background: #f0f4ff;
        }
        .table-custom tbody td {
            padding: 0.9rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }
        .btn-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: #fff;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102,126,234,0.4);
            color: #fff;
        }
        .btn-gradient-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            border: none;
            color: #fff;
            font-weight: 500;
        }
        .btn-gradient-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(17,153,142,0.4);
            color: #fff;
        }
        .btn-gradient-danger {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            border: none;
            color: #fff;
            font-weight: 500;
        }
        .btn-gradient-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(235,51,73,0.4);
            color: #fff;
        }
        .btn-gradient-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            color: #fff;
            font-weight: 500;
        }
        .btn-gradient-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245,87,108,0.4);
            color: #fff;
        }
        .btn-gradient-info {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border: none;
            color: #fff;
            font-weight: 500;
        }
        .btn-gradient-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79,172,254,0.4);
            color: #fff;
        }
        .form-custom {
            border-radius: 12px;
            border: 1.5px solid #e0e0e0;
            padding: 0.65rem 1rem;
            transition: all 0.2s;
            font-size: 0.9rem;
        }
        .form-custom:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.15);
        }
        .form-custom-lg {
            padding: 0.8rem 1.2rem;
            font-size: 1rem;
        }
        .alert-custom {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.2rem;
            border-left: 4px solid;
        }
        .alert-custom.alert-success {
            background: #d4edda;
            border-left-color: #28a745;
        }
        .badge-status {
            padding: 0.4rem 0.9rem;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 500;
        }
        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }
        .empty-state i {
            font-size: 4rem;
            color: #d0d0d0;
            margin-bottom: 1rem;
        }
        .empty-state h6 {
            color: #888;
            font-weight: 500;
        }
        .page-title {
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
        }
        .page-title i {
            margin-right: 10px;
            color: #667eea;
        }
        .action-group {
            display: flex;
            gap: 5px;
        }
        .action-group .btn {
            padding: 0.3rem 0.7rem;
            font-size: 0.8rem;
            border-radius: 8px;
        }
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .summary-card {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #f0f0f0;
        }
        .summary-card .label {
            color: #888;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .summary-card .value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a2e;
        }
        .gradient-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .gradient-2 { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .gradient-3 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .gradient-4 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .gradient-5 { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-box-seam me-2"></i>SCM App</h4>
            <small>Manajemen Rantai Pasokan</small>
        </div>
        <nav class="mt-3">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('supplier.index') }}" class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                <i class="bi bi-truck"></i> Supplier
            </a>
            <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Kategori
            </a>
            <a href="{{ route('satuan.index') }}" class="nav-link {{ request()->routeIs('satuan.*') ? 'active' : '' }}">
                <i class="bi bi-rulers"></i> Satuan
            </a>
            <a href="{{ route('produk.index') }}" class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <i class="bi bi-box"></i> Produk
            </a>
            <a href="{{ route('purchase_order.index') }}" class="nav-link {{ request()->routeIs('purchase_order.*') ? 'active' : '' }}">
                <i class="bi bi-cart-plus"></i> Purchase Order
            </a>
            <a href="{{ route('penerimaan_barang.index') }}" class="nav-link {{ request()->routeIs('penerimaan_barang.*') ? 'active' : '' }}">
                <i class="bi bi-arrow-down-circle"></i> Penerimaan
            </a>
            <a href="{{ route('sales_order.index') }}" class="nav-link {{ request()->routeIs('sales_order.*') ? 'active' : '' }}">
                <i class="bi bi-cart-check"></i> Sales Order
            </a>
            <a href="{{ route('mutasi.index') }}" class="nav-link {{ request()->routeIs('mutasi.*') ? 'active' : '' }}">
                <i class="bi bi-arrow-left-right"></i> Mutasi Stok
            </a>
            <a href="{{ route('laporan.index') }}" class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart"></i> Laporan
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div>
                <h5>@yield('page_title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>{{ now()->format('d F Y') }}</span>
            </div>
        </div>

        <div class="content-wrapper">
            @if(session('success'))
                <div class="floating-alert">
                    <div class="alert alert-success alert-custom d-flex align-items-center shadow-sm mb-0">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close ms-3" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="floating-alert">
                    <div class="alert alert-danger alert-custom d-flex align-items-center shadow-sm mb-0">
                        <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
                        <span>{{ session('error') }}</span>
                        <button type="button" class="btn-close ms-3" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(function() {
            document.querySelectorAll('.floating-alert').forEach(function(el) {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(function() { el.remove(); }, 500);
            });
        }, 4000);
    </script>
</body>
</html>