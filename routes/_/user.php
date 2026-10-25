<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::post('/rekomendasi-terdekat', [HomeController::class, 'nearby'])->name('user.nearby');
Route::get('/paket-wisata/{id}', [HomeController::class, 'show'])->name('user.packages.show');
