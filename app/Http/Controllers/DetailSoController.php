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
