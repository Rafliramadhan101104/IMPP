<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiLineController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

// CRUD
Route::resource('lokasi-line', LokasiLineController::class);
Route::resource('produksi', ProduksiController::class);
Route::resource('tindakan', TindakanController::class);