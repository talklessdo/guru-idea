<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
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
        $bk = Indikator::where('kategori', '1')->get();
        return view("bk.bk1", compact('bk'));
    }
    public function showBk2()
    {
        $bk = Indikator::where('kategori', '2')->get();
        return view("bk.bk2", compact('bk'));
    }
    public function showBk3()
    {
        $bk = Indikator::where('kategori', '3')->get();
        return view("bk.bk3", compact('bk'));
    }
    public function showBk4()
    {
        $bk = Indikator::where('kategori', '4')->get();
        $data = [
            [
                'id' => 1,
                'judul' => 'Contoh Judul 1',
                'mapel' => 'Matematika',
                'tanggal' => '2025-06-18',
                'status' => 'Menunggu',
                'lihatUrl' => '/dokumen/1',
                'editUrl' => '/dokumen/1/edit',
                'hapusUrl' => '/dokumen/1/delete'
            ],
            [
                'id' => 2,
                'judul' => 'Contoh Judul 2',
                'mapel' => 'Bahasa Indonesia',
                'tanggal' => '2025-06-17',
                'status' => 'Disetujui',
                'lihatUrl' => '/dokumen/2',
                'editUrl' => '/dokumen/2/edit',
                'hapusUrl' => '/dokumen/2/delete'
            ]
        ];

        return view("bk.bk4", compact('bk', 'data'));
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
