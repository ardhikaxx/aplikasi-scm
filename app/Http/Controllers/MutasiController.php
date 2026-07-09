<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $mutasis = Mutasi::all();
        return view('mutasi.index', compact('mutasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mutasi.create');
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
        $mutasi = Mutasi::findOrFail($id);
        return view('mutasi.edit', compact('mutasi'));
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
