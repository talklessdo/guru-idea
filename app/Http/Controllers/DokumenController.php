<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $originalName = $file->getClientOriginalName();
        $cleanName = preg_replace('/\s+/', '-', $originalName);
        $filename = time() . '_' . $cleanName;


        $destinationPath = public_path('uploads/dokumen');

        // Buat folder jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Cek apakah file dengan nama tersebut sudah ada
        if (file_exists($destinationPath . '/' . $filename)) {
            return redirect()->back()->with('error', 'Dokumen sudah pernah diunggah');
        }

        // Pindahkan file ke folder public/uploads/dokumen
        $file->move($destinationPath, $filename);

        // Path relatif untuk disimpan di database
        $relativePath = 'uploads/dokumen/' . $filename;

        // Simpan ke database
        $saved = BukuKerja::create([
            'nama_guru'      => $request->nama_guru,
            'judul'          => $request->judul,
            'guru_id'        => $request->id_guru,
            'indikator_id'   => $request->indikator,
            'mata_pelajaran' => $validated['mapel'],
            'semester'       => $request->semester,
            'tp'             => $request->tp,
            'slug'           => Str::slug($request->judul . '-' . uniqid()),
            'kelas'          => strtoupper($validated['kelas']),
            'kategori'       => $validated['kategori'],
            'file_path'      => $relativePath,
            'nama_file'      => $filename,
            'status'         => 'pending',
            'catatan'         => null,
        ]);

        if ($saved) {
            return redirect('/bk')->with('success', 'Dokumen berhasil diunggah!');
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

        return view('document.edit_dokumen', compact(
            'dokumen',
             'indikator1',
              'indikator2', 'indikator3',
              'indikator4',
            ));

        // dd($bkIndikator->all());
    }

    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, $slug)
    {
        $id = Auth::id();

        $dokumen = BukuKerja::where('slug', $slug)
            ->where('guru_id', $id)
            ->firstOrFail();

        $validatedData = $request->validate([
            'judul'          => 'required|string|max:255',
            'mata_pelajaran' => 'required|string',
            'kelas'          => 'required|string|in:x,xi,xii',
            'semester'       => 'required',
            'tp'             => 'required',
            'kategori'       => 'required|string|in:bk1,bk2,bk3,bk4',
            'file'           => 'nullable|mimes:pdf|max:5000',
            'indikator_id'   => 'required',
            'catatan'        => 'nullable|string',
            'status'         => 'required|string|in:pending,approve,validate,decline',
        ]);

        // Update slug jika judul berubah
        if ($dokumen->judul !== $request->judul) {
            $validatedData['slug'] = Str::slug($request->judul . '-' . uniqid());
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $originalName = $file->getClientOriginalName();
            $cleanName = preg_replace('/\s+/', '-', $originalName);
            $fileName =  time() . '_' . $cleanName;

            $destinationPath = public_path('uploads/dokumen');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $targetPath = $destinationPath . DIRECTORY_SEPARATOR . $fileName;

            if (file_exists($targetPath)) {
                $existingContent = file_get_contents($targetPath);
                $newContent = file_get_contents($file->getRealPath());

                if ($existingContent === $newContent) {
                    return redirect()->back()->with('error', 'Berkas sudah pernah diunggah sebelumnya.');
                }
            }

            $oldPath = public_path('uploads/dokumen/' . $dokumen->nama_file);
            if ($dokumen->nama_file && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file->move($destinationPath, $fileName);

            $validatedData['file_path'] = 'uploads/dokumen/' . $fileName;
            $validatedData['nama_file'] = $fileName;
        }

        // Update data ke database
        $dokumen->update($validatedData);

        return redirect('/bk')->with('success', 'Dokumen berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function updateStatus($id)
    {
        $dokumen = BukuKerja::find($id);
        $dokumen->status = 'decline';
        $dokumen->save();

        return redirect()->back()->with('success', 'Dokumen berhasil ditolak!');
    }

    public function setujuiDokumen($id){
        $dokumen = BukuKerja::find($id);
        $dokumen->status = 'approve';
        $dokumen->save();

        return redirect()->back()->with('success', 'Dokumen berhasil disetujui!');
    }

    public function validasi(Request $request, $id){
        $dokumen = BukuKerja::find($id);
        $dokumen->status = $request->action;
        $dokumen->catatan = $request->catatan_kepsek;
        $dokumen->save();

        return redirect()->back()->with('success', 'Dokumen berhasil disetujui!');
    }

   public function destroy($id)
    {
        $bukuKerja = BukuKerja::find($id);

        if (!$bukuKerja) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
        }

        // Path relatif ke folder public
        $filePath = public_path('uploads/dokumen/' . $bukuKerja->nama_file);

        // Hapus file jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data dari database
        $bukuKerja->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }

    public function dokumenMasuk(){
        $dokumenMasuk = BukuKerja::where('status', 'pending')->get();
        return view('kurikulum.dokumen_masuk', compact('dokumenMasuk'));
    }





}
