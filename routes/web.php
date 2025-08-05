<?php

use App\Http\Controllers\BukuKerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get("/", [DashboardController::class,"index"])->middleware("auth");
Route::get("/dashboard", [DashboardController::class,"dashboard"])->middleware("auth");
Route::get("/login", [LoginController::class,"index"])->name("login")->middleware('guest');
Route::post('/login', [LoginController::class,'otentikasi']);
Route::get('logout', [LoginController::class,'logout']);

// dokumen
Route::post('/upload', [DokumenController::class,'store']);
Route::get('/dokumen-{slug}', [DokumenController::class,'edit'])->name(name: "edit_dokumen")->middleware('auth');;
Route::post('/update_dokumen/{slug}', [DokumenController::class,'update'])->name(name: "update_dokumen")->middleware('auth');
Route::get('/upload_dokumen', [BukuKerjaController::class,'dokumen'])->name(name: "dokumen")->middleware('auth');
Route::get('/delete_dokumen/{id}', [DokumenController::class,'destroy'])->name('delete_dokumen')->middleware('auth');
Route::get('/bk', [BukuKerjaController::class,'index'])->middleware('auth');
Route::get('/bk-1', [BukuKerjaController::class,'showBk1'])->middleware('auth');
Route::get('/bk-2', [BukuKerjaController::class,'showBk2'])->middleware('auth');
Route::get('/bk-3', [BukuKerjaController::class,'showBk3'])->middleware('auth');
Route::get('/bk-4', [BukuKerjaController::class,'showBk4'])->middleware('auth');
Route::post('/catatan/{id}', [BukuKerjaController::class,'catatan'])->name('catatan')->middleware('auth');
Route::get('/tolak-dokumen/{id}', [DokumenController::class,'updateStatus'])->name('tolak_dokumen')->middleware('auth');
Route::get('/setujui-dokumen/{id}', [DokumenController::class,'setujuiDokumen'])->name('setujui_dokumen')->middleware('auth');
Route::get('/dokumen_masuk', [DokumenController::class,'dokumenMasuk'])->middleware('auth');

// Guru
Route::get('/manage_akun', [GuruController::class,'index'])->middleware('auth');
Route::get('/detail_guru-{id}', [GuruController::class,'show'])->name('detail_akun')->middleware('auth');
Route::get('/edit_guru-{id}', [GuruController::class,'edit'])->name('edit_akun')->middleware('auth');
Route::get('/delete_akun/{id}', [GuruController::class,'destroy'])->middleware('auth');
Route::post('/update_guru/{id}', [GuruController::class,'update'])->middleware('auth');


// Route::get('/akun', [GuruController::class,'detail'])->middleware('auth');
Route::get('/add_akun', [GuruController::class,'create'])->middleware('auth');
Route::post('/store_akun', [GuruController::class,'store'])->middleware('auth');

// profile
Route::get('/profile', [ProfileController::class,'index'])->middleware('auth');
Route::get('/edit-profile', [ProfileController::class,'edit'])->middleware('auth');
Route::get('/edit-profile/{id}', [ProfileController::class,'edit'])->middleware('auth');
Route::post('/update-profile', [ProfileController::class,'update'])->middleware('auth');
Route::post('/update-photo/{id}', [ProfileController::class,'uploadPhoto'])->name('upload.photo')->middleware('auth');
Route::get('/delete-photo/{id}', [ProfileController::class,'deletePhoto'])->middleware('auth');

Route::get('/riwayat', [App\Http\Controllers\KurikulumController::class, 'riwayat'])->middleware('auth');
Route::get('/progres', [App\Http\Controllers\KurikulumController::class, 'progres'])->middleware('auth');

// Pengesahan Kepala Sekolah
Route::get('/list_pengesahan', [KepsekController::class, 'index'])->name('list_pengesahan')->middleware('auth');Route::post('/kepsek/pengesahan', [App\Http\Controllers\KepsekController::class, 'prosesPengesahan'])->name('kepsek.pengesahan')->middleware('auth');
Route::post('/validasi/{id}', [DokumenController::class, 'validasi'])->name('validasi')->middleware('auth');