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
        body { background: #f1f5f9; }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #1e293b;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .sidebar-brand {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-brand h4 {
            color: #fff;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0;
            font-size: 1.2rem;
        }
        .sidebar-brand small {
            color: #94a3b8;
            font-size: 0.7rem;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            padding: 0.7rem 1.2rem;
            margin: 2px 0.7rem;
            border-radius: 8px;
            font-size: 0.88rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .nav-link i { font-size: 1.05rem; width: 20px; text-align: center; }
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
        }
        .sidebar .nav-link.active {
            color: #2563eb;
            background: rgba(37,99,235,0.12);
        }
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }
        .topbar {
            background: #fff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e2e8f0;
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
            color: #1e293b;
            font-size: 1.1rem;
        }
        .topbar h5 i {
            color: #2563eb;
            margin-right: 10px;
        }
        .content-wrapper {
            padding: 1.5rem 2rem;
        }
        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: all 0.25s;
        }
        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .stat-card .card-body {
            padding: 1.4rem;
        }
        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .stat-card .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            line-height: 1.2;
        }
        .stat-card .stat-label {
            font-size: 0.82rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .stat-card .stat-footer {
            font-size: 0.75rem;
            color: #94a3b8;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        .card-custom .card-header {
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.1rem 1.4rem;
            font-weight: 600;
            color: #1e293b;
            font-size: 0.95rem;
        }
        .card-custom .card-header i { color: #2563eb; }
        .card-custom .card-body { padding: 1.4rem; }
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-custom thead th {
            background: #f8fafc;
            border-bottom: 1.5px solid #e2e8f0;
            color: #475569;
            font-weight: 600;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 0.85rem 1rem;
        }
        .table-custom tbody tr {
            transition: background 0.15s;
        }
        .table-custom tbody tr:hover {
            background: #f8fafc;
        }
        .table-custom tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }
        .btn-primary-custom {
            background: #2563eb;
            border: none;
            color: #fff;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
        }
        .btn-primary-custom:hover {
            background: #1d4ed8;
            color: #fff;
        }
        .btn-success-custom {
            background: #059669;
            border: none;
            color: #fff;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
        }
        .btn-success-custom:hover {
            background: #047857;
            color: #fff;
        }
        .btn-danger-custom {
            background: #dc2626;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-danger-custom:hover {
            background: #b91c1c;
            color: #fff;
        }
        .btn-warning-custom {
            background: #d97706;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-warning-custom:hover {
            background: #b45309;
            color: #fff;
        }
        .btn-info-custom {
            background: #0891b2;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-info-custom:hover {
            background: #0e7490;
            color: #fff;
        }
        .btn-outline-custom {
            border: 1.5px solid #e2e8f0;
            color: #475569;
            background: #fff;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 0.5rem 1.2rem;
        }
        .btn-outline-custom:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }
        .btn-sm-custom {
            padding: 0.25rem 0.6rem;
            font-size: 0.78rem;
            border-radius: 6px;
        }
        .form-custom {
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            padding: 0.6rem 0.9rem;
            font-size: 0.9rem;
            transition: border-color 0.15s;
        }
        .form-custom:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }
        .form-custom-lg {
            padding: 0.75rem 1rem;
        }
        .page-title {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            font-size: 1.2rem;
        }
        .page-title i { color: #2563eb; margin-right: 10px; }
        .section-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }
        .badge-status {
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-blue { background: #dbeafe; color: #1d4ed8; }
        .badge-green { background: #d1fae5; color: #047857; }
        .badge-red { background: #fee2e2; color: #b91c1c; }
        .badge-yellow { background: #fef3c7; color: #b45309; }
        .badge-gray { background: #f1f5f9; color: #475569; }
        .empty-state {
            padding: 2.5rem 1rem;
            text-align: center;
        }
        .empty-state i {
            font-size: 3rem;
            color: #cbd5e1;
            margin-bottom: 0.8rem;
        }
        .empty-state h6 {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.9rem;
        }
        .action-group {
            display: flex;
            gap: 4px;
        }
        .action-group .btn {
            padding: 0.25rem 0.55rem;
            font-size: 0.78rem;
            border-radius: 6px;
        }
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 320px;
            animation: slideIn 0.25s ease;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .summary-card {
            background: #fff;
            border-radius: 12px;
            padding: 1.2rem;
            border: 1px solid #f1f5f9;
        }
        .summary-card .label {
            color: #64748b;
            font-size: 0.8rem;
            font-weight: 500;
        }
        .summary-card .value {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
        }
        .icon-box {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        .bg-soft-primary { background: #dbeafe; color: #2563eb; }
        .bg-soft-success { background: #d1fae5; color: #059669; }
        .bg-soft-warning { background: #fef3c7; color: #d97706; }
        .bg-soft-info { background: #cffafe; color: #0891b2; }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-brand">
            <h4><i class="bi bi-box-seam me-2"></i>SCM App</h4>
            <small>Manajemen Rantai Pasokan</small>
        </div>
        <nav class="mt-2 flex-grow-1">
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
        <div class="p-3 border-top border-secondary border-opacity-10">
            <small class="text-secondary" style="color: #475569 !important; font-size: 0.7rem;">
                <i class="bi bi-calendar3 me-1"></i>{{ now()->format('d F Y') }}
            </small>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h5><i class="bi bi-grid-1x2"></i>@yield('page_title', 'Dashboard')</h5>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted small">v1.0</span>
            </div>
        </div>

        <div class="content-wrapper">
            @if(session('success'))
                <div class="floating-alert">
                    <div class="alert alert-success d-flex align-items-center shadow-sm mb-0 border-0" style="border-radius: 10px; border-left: 4px solid #059669 !important;">
                        <i class="bi bi-check-circle-fill me-2" style="color: #059669;"></i>
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close ms-3" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="floating-alert">
                    <div class="alert alert-danger d-flex align-items-center shadow-sm mb-0 border-0" style="border-radius: 10px; border-left: 4px solid #dc2626 !important;">
                        <i class="bi bi-exclamation-circle-fill me-2" style="color: #dc2626;"></i>
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
                el.style.transition = 'opacity 0.4s';
                el.style.opacity = '0';
                setTimeout(function() { el.remove(); }, 400);
            });
        }, 4000);
    </script>
</body>
</html>