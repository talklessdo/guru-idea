<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function masuk()
    {
        $indikator1 = DB::table("indikator")->select('*')
        ->where('kategori','=','1')->get();
        $indikator2 = DB::table("indikator")->select('*')
        ->where('kategori','=','2')->get();
        $indikator3 = DB::table("indikator")->select('*')
        ->where('kategori','=','3')->get();
        $indikator4 = DB::table("indikator")->select('*')
        ->where('kategori','=','4')->get();
        if (Auth::user()->role == 'guru') {

            return view("dashboard", 
            [
                "indikator1"=> $indikator1,
                "indikator2"=> $indikator2,
                "indikator3"=> $indikator3,
                "indikator4"=> $indikator4
            ]);
        }else{
            return view("index");

        }
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
