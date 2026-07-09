<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanBarang;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
