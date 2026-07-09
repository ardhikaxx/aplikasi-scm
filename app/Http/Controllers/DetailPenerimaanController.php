<?php

namespace App\Http\Controllers;

use App\Models\DetailPenerimaan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenerimaanController extends Controller
{
    public function index($id_penerimaan)
    {
        $details = DetailPenerimaan::with('produk')
            ->where('id_penerimaan', $id_penerimaan)
            ->get();
        $idPenerimaan = $id_penerimaan;
        return view('detail_penerimaan.index', compact('details', 'idPenerimaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_penerimaan)
    {
        $idPenerimaan = $id_penerimaan;
        $produks = Produk::all();
        return view('detail_penerimaan.create', compact('idPenerimaan', 'produks'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_penerimaan, $id_detail)
    {
        $idPenerimaan = $id_penerimaan;
        $detail = DetailPenerimaan::findOrFail($id_detail);
        $produks = Produk::all();
        return view('detail_penerimaan.edit', compact('idPenerimaan', 'detail', 'produks'));
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
