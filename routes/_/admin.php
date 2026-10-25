<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PaketWisataController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\SubKriteriaController;
use Illuminate\Support\Facades\Route;

Route::resource('/', DashboardController::class);

Route::resource('/paket-wisata', PaketWisataController::class);
Route::resource('/pengguna', PenggunaController::class);
Route::resource('/kriteria', KriteriaController::class);
Route::resource('/sub-kriteria', SubKriteriaController::class);
Route::get('/perhitungan/calculate', [PerhitunganController::class, 'calculate'])->name('perhitungan.calculate');
Route::post('/perhitungan/reset', [PerhitunganController::class, 'reset'])->name('perhitungan.reset');
Route::resource('/perhitungan', PerhitunganController::class);
