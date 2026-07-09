<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanBarang;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PenerimaanBarangController extends Controller
{
    public function index()
    {
        $penerimaanBarangs = PenerimaanBarang::with('purchaseOrder')->get();
        return view('penerimaan_barang.index', compact('penerimaanBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pos = PurchaseOrder::with('supplier')->get();
        return view('penerimaan_barang.create', compact('pos'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $penerimaanBarang = PenerimaanBarang::with('purchaseOrder')->findOrFail($id);
        $pos = PurchaseOrder::with('supplier')->get();
        return view('penerimaan_barang.edit', compact('penerimaanBarang', 'pos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
