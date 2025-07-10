<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function dashboard(){
        $kemarin = Carbon::today()->subDays(1); // Kemarin
        Carbon::today()->addDays(1); // Besok

        $idGuru = Auth::user()->id;
        $jmlGuru = Guru::count();
        $jmlBk = BukuKerja::count();

        // Data Guru
        $jmlBkGuruApprove = BukuKerja::where('guru_id', $idGuru)
        ->where('status','approve')
        ->count();
        $jmlBkGuruPending = BukuKerja::where('guru_id', $idGuru)
        ->where('status','pending')
        ->count();
        $jmlBkGuruDecline = BukuKerja::where('guru_id', $idGuru)
        ->where('status','decline')
        ->count();






        $dataBk = BukuKerja::whereDate('created_at', Carbon::today())->get();
        $bkPending = BukuKerja::where('status', '=', 'pending')->get();
        $jml_tugas_selesai = BukuKerja::where('status', '=', 'approve')->count();
        $jml_waiting = BukuKerja::where('status', '=', 'pending')->count();
        return view("dashboard", 
        compact(
            "jmlGuru", 
        "jmlBk",
        "jml_tugas_selesai",
        "jml_waiting",
        "dataBk",
        "jmlBkGuruApprove",
        "jmlBkGuruPending",
        "jmlBkGuruDecline",
        'bkPending',
        ));
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
