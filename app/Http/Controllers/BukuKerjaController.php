<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $data = DB::table('buku_kerja')
        ->select('*')->where('guru_id', $user)
        ->orderBy('created_at','desc')
        ->get();


        
        if (Auth::user()->role == 'guru') {

            return view("bk", 
            [
                "data" => $data,
            ]);
        }else{
            return view("index");

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dokumen()
    {
        $indikator1 = DB::table("indikator")->select('*')
        ->where('kategori','=','1')->get();
        $indikator2 = DB::table("indikator")->select('*')
        ->where('kategori','=','2')->get();
        $indikator3 = DB::table("indikator")->select('*')
        ->where('kategori','=','3')->get();
        $indikator4 = DB::table("indikator")->select('*')
        ->where('kategori','=','4')->get();

        return view("dokumen", 
            [
                "indikator1"=> $indikator1,
                "indikator2"=> $indikator2,
                "indikator3"=> $indikator3,
                "indikator4"=> $indikator4,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showBk1()
    {
        return view("bk.bk1");
    }
    public function showBk2()
    {
        return view("bk.bk2");
    }
    public function showBk3()
    {
        return view("bk.bk3");
    }
    public function showBk4()
    {
        return view("bk.bk4");
    }
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
