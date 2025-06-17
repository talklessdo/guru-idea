<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', '!=','admin')->get();
        // dd($user);
        return view("operator.manage_akun", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.add_akun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:guru,kepsek,kurikulum',
        ], [
            'name.required'     => 'Nama wajib diisi.',
            'name.max'          => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email ini sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'role.required'     => 'Role harus dipilih.',
            'role.in'           => 'Role harus salah satu dari: guru, kepsek, atau kurikulum.',
        ]);


        // Simpan user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        Guru::create([
            'user_id' => $user->id
        ]);

        return redirect('/manage_akun')->with('store', 'Akun berhasil ditambahkan.');
        
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
    $userId = DB::table('guru')->where('user_id', $id)->value('user_id');

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
    DB::table('guru')->where('user_id', $id)->update([
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

    // Redirect ke dashboard dengan notifikasi
    return redirect()->route('detail_akun', ['id'=> $userId])->with('success', 'Data guru berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil data guru berdasarkan ID
        $akun = User::findOrFail($id);

        // Hapus guru yang terkait jika ada
        if ($akun->id) {
            $guru = Guru::where('user_id', $akun->id)->first();
            if ($guru) {
                $guru->delete();
            }
        }

        // Hapus data akun
        $akun->delete();

        return redirect('/manage_akun')->with('hapus','berhasil dihapus');
        // dd($id);
    }
}
