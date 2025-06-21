<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'file'     => 'required|mimes:pdf|max:5000',
        ], [
            'judul.required'    => 'Judul dokumen wajib diisi.',
            'judul.string'      => 'Judul harus berupa teks.',
            'judul.max'         => 'Judul maksimal 255 karakter.',
            
            'mapel.required'    => 'Mata pelajaran wajib dipilih.',
            'mapel.string'      => 'Mata pelajaran tidak valid.',

            'kelas.required'    => 'Kelas wajib dipilih.',
            'kelas.in'          => 'Kelas harus salah satu dari: X, XI, atau XII.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in'       => 'Kategori harus salah satu dari: Buku Kerja 1, 2, 3, atau 4.',

            'file.required'     => 'File dokumen wajib diunggah.',
            'file.mimes'        => 'File harus berformat PDF.',
            'file.max'          => 'Ukuran file maksimal 5MB.',
        ]);


        // Cek apakah file berhasil diunggah
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $slug = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        
            // Menambahkan ekstensi file
            $fileName = $slug . '.' . $file->getClientOriginalExtension();
            
            
            // Cek apakah file dengan nama tersebut sudah ada di storage
            if (Storage::disk('public')->exists('dokumen/' . $fileName)) {
                return redirect()->back()->with('error', 'Dokumen sudah pernah diunggah');
            }
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
                    'tp'     => $request->tp,
                    'slug'     => Str::slug($request->judul . '-' . uniqid()),
                    'kelas'     => strtoupper($validated['kelas']),
                    'kategori'  => $validated['kategori'],
                    'file_path' => $filePath,
                    'status'    => 'pending',
                    'nama_file'    => $fileName,
                ]);

                if ($saved) {
                    return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
                } 
            } 
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
    public function edit($slug)
    {
        $dokumen = BukuKerja::where('slug', $slug)->firstOrFail();

        // Data indikator per kategori, pastikan sudah dibuat di model/DB
        $indikator1 = Indikator::where('kategori', '1')->get();
        $indikator2 = Indikator::where('kategori', '2')->get();
        $indikator3 = Indikator::where('kategori', '3')->get();
        $indikator4 = Indikator::where('kategori', '4')->get();


        return view('document.edit_dokumen', compact('dokumen', 'indikator1', 'indikator2', 'indikator3', 'indikator4'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function updats(Request $request, $slug){
        $id = Auth::user()->id;
        $dokumen = BukuKerja::where('slug', $slug)
        ->where('guru_id',$id)->get();
        dd($dokumen);
     }
    public function update(Request $request, $slug)
{
        // Ambil dokumen berdasarkan slug
        $id = Auth::user()->id;
        $dokumen = BukuKerja::where('slug', $slug)
        ->where('guru_id',$id)->firstOrFail();

        $validatedData = $request->validate([
            'judul'    => 'required|string|max:255',
            'mata_pelajaran'    => 'required|string',
            'kelas'    => 'required|string|in:x,xi,xii',
            'semester' => 'required',
            'tp' => 'required',
            'kategori' => 'required|string|in:bk1,bk2,bk3,bk4',
            'file'     => 'mimes:pdf|max:5000',
            'indikator_id' => 'required',
        ], [
            'judul.required'    => 'Judul dokumen wajib diisi.',
            'judul.string'      => 'Judul harus berupa teks.',
            'judul.max'         => 'Judul maksimal 255 karakter.',
            
            'mata_pelajaran.required'    => 'Mata pelajaran wajib dipilih.',
            'mata_pelajaran.string'      => 'Mata pelajaran tidak valid.',

            'kelas.required'    => 'Kelas wajib dipilih.',
            'kelas.in'          => 'Kelas harus salah satu dari: X, XI, atau XII.',

            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in'       => 'Kategori harus salah satu dari: Buku Kerja 1, 2, 3, atau 4.',

            'file.mimes'        => 'File harus berformat PDF.',
            'file.max'          => 'Ukuran file maksimal 5MB.',
        ]);
       

        // Update slug jika judul berubah
        if ($dokumen->judul !== $request->judul) {
            $validatedData['slug'] = Str::slug($request->judul . '-' . uniqid());
        }

        // Jika file baru diunggah, hapus file lama
        if ($request->hasFile('file')) {
            if ($dokumen->file && Storage::exists('dokumen/' . $dokumen->file)) {
                Storage::delete('dokumen/' . $dokumen->file);
            }

            // Simpan file baru
            $filename = time() . '-' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('dokumen', $filename);
            $validatedData['file'] = $filename;
        }

        // // Update data ke database
        $dokumen->update($validatedData);
        
        // // Redirect dengan pesan sukses
        return redirect('/bk')->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
