<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get("/", [DashboardController::class,"index"])->middleware("guest");
Route::get("/dashboard", [DashboardController::class,"masuk"])->middleware("auth");
Route::get("/login", [LoginController::class,"index"])->name("login")->middleware('guest');
Route::post('/login', [LoginController::class,'otentikasi']);
Route::get('logout', [LoginController::class,'logout']);
Route::post('/upload', [DokumenController::class,'store']);