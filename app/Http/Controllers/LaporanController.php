<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PenerimaanBarang;
use App\Models\SalesOrder;
use App\Models\Mutasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function purchaseOrder()
    {
        $purchaseOrders = PurchaseOrder::with('supplier')->get();
        return view('laporan.purchase_order', compact('purchaseOrders'));
    }

    public function penerimaanBarang()
    {
        $penerimaans = PenerimaanBarang::with('purchaseOrder.supplier')->get();
        return view('laporan.penerimaan_barang', compact('penerimaans'));
    }

    public function salesOrder()
    {
        $salesOrders = SalesOrder::all();
        return view('laporan.sales_order', compact('salesOrders'));
    }

    public function mutasi()
    {
        $mutasis = Mutasi::all();
        return view('laporan.mutasi', compact('mutasis'));
    }
}
