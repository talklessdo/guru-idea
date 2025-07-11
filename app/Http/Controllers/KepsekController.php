<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumenKepsek = BukuKerja::where('status', '!=', 'pending')->get();
        return view('kepsek.list_pengesahan', compact('dokumenKepsek'));
    }

    /**
     * Show the form for creating a new resource.
     */

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
