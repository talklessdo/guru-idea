<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuKerja;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("role.kurikulum");
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

    /**
     * Tampilkan halaman riwayat persetujuan
     */
    public function riwayat()
    {
        $riwayat = BukuKerja::where('status', '!=', 'pending')->orderBy('created_at', 'desc')->get();
        return view('kurikulum.riwayat', compact('riwayat'));
    }

    /**
     * Tampilkan halaman progres dokumen per guru
     */
    public function progres(Request $request)
    {
        // Ambil daftar tahun 2023-2028
        $tahunList = range(2023, 2028);
        $tahunTerpilih = $request->get('tahun', date('Y'));

        $data = BukuKerja::selectRaw('nama_guru, 
            COUNT(*) as total, 
            SUM(status = "approve") as approve, 
            SUM(status = "decline") as decline, 
            SUM(status = "pending") as pending')
            ->whereYear('created_at', $tahunTerpilih)
            ->groupBy('nama_guru')
            ->get();
        $progres = $data->map(function($row) {
            return [
                'nama' => $row->nama_guru,
                'total' => (int)$row->total,
                'approve' => (int)$row->approve,
                'decline' => (int)$row->decline,
                'pending' => (int)$row->pending,
            ];
        })->toArray();
        return view('kurikulum.progres', compact('progres', 'tahunList', 'tahunTerpilih'));
    }
}
