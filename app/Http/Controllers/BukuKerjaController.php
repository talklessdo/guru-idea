<?php

namespace App\Http\Controllers;

use App\Models\BukuKerja;
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
        ->join('indikator', 'buku_kerja.indikator_id', '=', 'indikator.id')
        ->select('*','buku_kerja.id AS idBK', 'indikator.kategori AS indikatorBk')->where('guru_id', $user)
        ->orderBy('buku_kerja.created_at','desc')
        ->get();

        $dataBk = DB::table('buku_kerja')
        ->join('indikator', 'buku_kerja.indikator_id', '=', 'indikator.id')
        ->select('*','buku_kerja.id AS idBK', 'indikator.kategori AS indikatorBk')
        ->orderBy('buku_kerja.created_at','desc')
        ->get();

        
        if (Auth::user()->role == 'guru') {

            return view("bk", 
            [
                "data" => $data,
            ]);
        }else{
            return view("bk", 
            [
                "data" => $dataBk,
            ]);

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

        return view("document.dokumen", 
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
        $id = Auth::user()->id;
        $dataBk = BukuKerja::where('guru_id', $id)
        ->where('kategori','bk1')
        ->where('status','=','validate')
        ->get();
        $data = [];

        foreach ($dataBk as $item) {
            $edit = route('edit_dokumen', ['slug' => $item->slug]);
            $hapus = route('delete_dokumen', ['id' => $item->id]);
            $data[] = [
                'id' => $item->id,
                'judul' => $item->judul ?? 'Judul Tidak Tersedia',
                'mapel' => $item->mata_pelajaran ?? 'Belum Diisi',
                'tanggal' => $item->created_at->format('Y-m-d'),
                'lihat' => $item->nama_file,
                'indikator' => $item->indikator_id,
                'kelas' => $item->kelas,
                'semester' => $item->semester,
                'tp' => $item->tp,
                'editUrl' => $edit,
                'hapusUrl' => $hapus,
            ];
        }   

        return view("bk.bk1", compact('bk', 'data'));
    }
    public function showBk2()
    {
        $bk = Indikator::where('kategori', '2')->get();
        $id = Auth::user()->id;
        $dataBk = BukuKerja::where('guru_id', $id)
        ->where('kategori','bk2')
        ->where('status','=','validate')
        ->get();
        $data = [];

        foreach ($dataBk as $item) {
            $edit = route('edit_dokumen', ['slug' => $item->slug]);
            $hapus = route('delete_dokumen', ['id' => $item->id]);
            $data[] = [
                'id' => $item->id,
                'judul' => $item->judul ?? 'Judul Tidak Tersedia',
                'mapel' => $item->mata_pelajaran ?? 'Belum Diisi',
                'tanggal' => $item->created_at->format('Y-m-d'),
                'lihat' => $item->nama_file,
                'indikator' => $item->indikator_id,
                'kelas' => $item->kelas,
                'semester' => $item->semester,
                'tp' => $item->tp,
                'editUrl' => $edit,
                'hapusUrl' => $hapus,
            ];
        }   

        return view("bk.bk2", compact('bk', 'data'));
    }
    public function showBk3()
    {
        $bk = Indikator::where('kategori', '3')->get();
        $id = Auth::user()->id;
        $dataBk = BukuKerja::where('guru_id', $id)
        ->where('kategori','bk3')
        ->where('status','=','validate')
        ->get();
        $data = [];

        foreach ($dataBk as $item) {
            $edit = route('edit_dokumen', ['slug' => $item->slug]);
            $hapus = route('delete_dokumen', ['id' => $item->id]);
            $data[] = [
                'id' => $item->id,
                'judul' => $item->judul ?? 'Judul Tidak Tersedia',
                'mapel' => $item->mata_pelajaran ?? 'Belum Diisi',
                'tanggal' => $item->created_at->format('Y-m-d'),
                'lihat' => $item->nama_file,
                'indikator' => $item->indikator_id,
                'kelas' => $item->kelas,
                'semester' => $item->semester,
                'tp' => $item->tp,
                'editUrl' => $edit,
                'hapusUrl' => $hapus,
            ];
        }   

        return view("bk.bk3", compact('bk', 'data'));
    }
    public function showBk4()
    {
        $bk = Indikator::where('kategori', '4')->get();
        $id = Auth::user()->id;
        $dataBk = BukuKerja::where('guru_id', $id)
        ->where('kategori','bk4')
        ->where('status','=','validate')
        ->get();
        $data = [];

        foreach ($dataBk as $item) {
            $edit = route('edit_dokumen', ['slug' => $item->slug]);
            $hapus = route('delete_dokumen', ['id' => $item->id]);
            $data[] = [
                'id' => $item->id,
                'judul' => $item->judul ?? 'Judul Tidak Tersedia',
                'mapel' => $item->mata_pelajaran ?? 'Belum Diisi',
                'tanggal' => $item->created_at->format('Y-m-d'),
                'lihat' => $item->nama_file,
                'indikator' => $item->indikator_id,
                'kelas' => $item->kelas,
                'semester' => $item->semester,
                'tp' => $item->tp,
                'editUrl' => $edit,
                'hapusUrl' => $hapus,
            ];
        }   

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
    public function catatan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'catatan' => 'nullable|string',  // 'nullable' memungkinkan nilai kosong
        ]);

        // Ambil nilai catatan dari input
        $catatan = $request->input('catatan');

        // Temukan data BukuKerja berdasarkan ID
        $dataBk = BukuKerja::find($id);

        // Jika catatan kosong, set null
        if (empty($catatan)) {
            $dataBk->catatan = null;
        } else {
            // Jika ada catatan, simpan nilai baru
            $dataBk->catatan = $catatan;
        }

        // Simpan perubahan
        $dataBk->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Catatan berhasil disimpan!');
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
