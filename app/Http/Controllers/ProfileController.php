<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;

        if ($role == 'guru') {
            $akun = DB::table('guru')
            ->join('users', 'guru.user_id', '=', 'users.id')
            ->select('guru.*', 'users.name', 'users.email', 'users.role')
            ->where('users.id', $id)
            ->first();
            
        }else {
            $akun = User::find($id);

        }
        return view('profile.profile', compact('akun'));
        // dd($guru);
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
    public function edit()
    {
        $userId = Auth::user()->id;
        $dataGuru = DB::table('guru')
        ->join('users', 'guru.user_id', '=', 'users.id')
        ->select('guru.*', 'users.*') // Pilih kolom yang dibutuhkan
        ->where('users.id', $userId)
        ->first();

        return view('profile.edit_profile', compact('dataGuru'));
    }

    public function editProfile($id)
    {
        $akun = User::find($id);
        return view('profile.profile_edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $role = Auth::user()->role;

        if ($role == 'guru') {
            $userId = DB::table('guru')->where('user_id', $id)->value('user_id');
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
                'penempatan' => 'nullable|string|max:100',
                'total_jtm' => 'numeric|min:0',
            ], [
                'name.required' => 'Nama harus diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'jk.required' => 'Jenis kelamin wajib dipilih.',
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
                'penempatan' => $request->penempatan,
                'total_jtm' => $request->total_jtm,
            ]);
            // Update tabel users
            DB::table('users')->where('id', $userId)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            // Non-guru: validasi password opsional
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
            ], [
                'name.required' => 'Nama harus diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        }
        return redirect('/profile')->with('profile', 'Data berhasil diperbarui.');
    }

    public function uploadPhoto(Request $request, $id)
    {
        // Validasi file foto
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
        ]);

        // Ambil user
        $user = User::find($id);

        // Ambil file yang di-upload
        $file = $request->file('photo');

        // Buat nama file baru
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

        // Path folder upload
        $uploadPath = public_path('uploads/photos');

        // Pastikan folder ada
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true);
        }

        // Hapus file lama jika ada
        if ($user->photo) {
            $oldPhotoPath = $uploadPath . '/' . $user->photo;
            if (File::exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }
        }

        // Pindahkan file baru
        $file->move($uploadPath, $fileName);

        // Simpan nama file baru ke database
        $user->photo = $fileName;
        $user->save();

        // Redirect kembali
        return back()->with('success', 'Foto berhasil di-upload!');
    }

    public function deletePhoto($id)
    {
        // Ambil user
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // Path folder penyimpanan foto
        $uploadPath = public_path('uploads/photos');

        // Cek dan hapus file jika ada
        if ($user->photo) {
            $photoPath = $uploadPath . '/' . $user->photo;
            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }

            // Kosongkan field photo di database
            $user->photo = null;
            $user->save();
        }

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
