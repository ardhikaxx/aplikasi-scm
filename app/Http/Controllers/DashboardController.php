<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Produk;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $supplier = Supplier::count();
        $produk = Produk::count();
        $po = PurchaseOrder::count();
        $stok = Produk::sum('stok');

        return view('dashboard.index', compact('supplier', 'produk', 'po', 'stok'));
    }
}
