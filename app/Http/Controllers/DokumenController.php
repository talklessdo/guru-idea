<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dokumen");
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
        // Validasi input
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'mapel'    => 'required|string',
            'kelas'    => 'required|string|in:x,xi,xii',
            'kategori' => 'required|string|in:bk1,bk2,bk3,bk4',
            'file'     => 'required|mimes:pdf|max:2048', // max 2MB
        ]);

        // Cek apakah file berhasil diunggah
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $slug = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        
            // Menambahkan ekstensi file
            $fileName = $slug . '.' . $file->getClientOriginalExtension();
            
            // Tentukan lokasi penyimpanan file di folder 'public/uploads'
            $filePath = $file->storeAs('dokumen', $fileName, 'public');

            // Cek apakah file path tersimpan
            if ($filePath) {
                // Simpan ke database
                $saved = BukuKerja::create([
                    'nama_guru'   => $request->nama_guru,
                    'judul'     => $request->judul,
                    'guru_id'     => $request->id_guru,
                    'indikator_id'     => $request->indikator,
                    'mata_pelajaran'     => $validated['mapel'],
                    'semester'     => $request->semester,
                    'slug'     => Str::slug($request->judul),
                    'kelas'     => strtoupper($validated['kelas']),
                    'kategori'  => $validated['kategori'],
                    'file_path' => $filePath,
                    'status'    => 'pending',
                    'nama_file'    => $fileName ,
                ]);

                if ($saved) {
                    return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
                } else {
                    return redirect()->back()->with('error', 'Gagal menyimpan dokumen ke database.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan file.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak valid atau gagal diunggah.');
        }
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
