<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        // dd($user);
        return view("operator.manage_guru", compact("user"));
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
    public function detail()
    {
        return view("detail_akun");
    }
    public function show($id)
    {
        $guru = DB::table('guru')
        ->join('users', 'guru.user_id', '=', 'users.id')
        ->select('guru.*', 'users.name', 'users.email', 'users.role')
        ->where('users.id', $id)
        ->first();

        return view('detail_akun', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $guru = Guru::find($id);
        $dataGuru = DB::table('guru')
        ->join('users', 'guru.user_id', '=', 'users.id')
        ->select('guru.*', 'users.*') // Pilih kolom yang dibutuhkan
        ->where('users.id', $id)
        ->first();

        return view('operator.edit_akun', compact('dataGuru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Ambil user_id dari tabel guru
    $userId = DB::table('guru')->where('id', $id)->value('user_id');

    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $userId,
        'status_pegawai' => 'nullable|string|max:100',
        'jk' => 'required|in:Laki-laki,Perempuan',
        'nip' => 'nullable|string|max:20',
        'nik' => 'nullable|string|max:20',
        'nuptk' => 'nullable|string|max:20',
        'tempat_lahir' => 'nullable|string|max:100',
        'tanggal_lahir' => 'nullable|date',
        'nomor_hp' => 'nullable|string|max:15',
        'tugas' => 'nullable|string|max:100',
        'mata_pelajaran' => 'required|string',
        'penempatan' => 'nullable|string|max:100',
        'total_jtm' => 'required|numeric|min:0',
    ], [
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'jk.required' => 'Jenis kelamin wajib dipilih.',
        'mata_pelajaran.required' => 'Mata pelajaran wajib dipilih.',
        'total_jtm.required' => 'Total jam harus diisi.',
        'total_jtm.numeric' => 'Total jam harus berupa angka.',
    ]);

    
    // Update tabel guru
    DB::table('guru')->where('id', $id)->update([
        'status_pegawai' => $request->status_pegawai,
        'jk' => $request->jk,
        'nip' => $request->nip,
        'nik' => $request->nik,
        'nuptk' => $request->nuptk,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nomor_hp' => $request->nomor_hp,
        'tugas' => $request->tugas,
        'mata_pelajaran' => $request->mata_pelajaran,
        'penempatan' => $request->penempatan,
        'total_jtm' => $request->total_jtm,
    ]);

    // Update tabel users
    DB::table('users')->where('id', $userId)->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);
    $guru = Guru::find($id);

    // Redirect ke dashboard dengan notifikasi
    return redirect()->route('detail_akun', ['id'=> $guru->id])->with('success', 'Data guru berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
