<?php

namespace App\Http\Controllers;

use App\Models\DetailPenerimaan;
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
