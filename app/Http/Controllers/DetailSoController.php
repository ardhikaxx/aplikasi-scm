<?php

namespace App\Http\Controllers;

use App\Models\DetailSo;
use Illuminate\Http\Request;

class DetailSoController extends Controller
{
    public function index($id_so)
    {
        $details = DetailSo::where('id_so', $id_so)->get();
        $idSo = $id_so;
        return view('detail_so.index', compact('details', 'idSo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_so)
    {
        $idSo = $id_so;
        return view('detail_so.create', compact('idSo'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_so, $id_detail)
    {
        $idSo = $id_so;
        $detail = DetailSo::findOrFail($id_detail);
        return view('detail_so.edit', compact('idSo', 'detail'));
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
