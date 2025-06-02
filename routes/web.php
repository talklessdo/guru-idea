<?php

use App\Http\Controllers\BukuKerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get("/", [DashboardController::class,"index"])->middleware("guest");
Route::get("/dashboard", [DashboardController::class,"dashboard"])->middleware("auth");
Route::get("/login", [LoginController::class,"index"])->name("login")->middleware('guest');
Route::post('/login', [LoginController::class,'otentikasi']);
Route::get('logout', [LoginController::class,'logout']);
Route::post('/upload', [DokumenController::class,'store']);
Route::get('/upload_dokumen', [BukuKerjaController::class,'dokumen']);
Route::get('/bk', [BukuKerjaController::class,'index']);
Route::get('/bk-1', [BukuKerjaController::class,'showBk1']);
Route::get('/bk-2', [BukuKerjaController::class,'showBk2']);
Route::get('/bk-3', [BukuKerjaController::class,'showBk3']);
Route::get('/bk-4', [BukuKerjaController::class,'showBk4']);