<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

// Rute untuk landing page publik
Route::get('/', function () {
    // Gunakan layout tamu untuk halaman ini
    return view('welcome');
});

// Rute dashboard yang hanya bisa diakses setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk manajemen profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::get('/kategori/{id}/buku', [KategoriController::class, 'buku'])->name('kategori.buku');
Route::resource('buku', BukuController::class)->middleware('auth');


// Ini akan menyertakan semua rute autentikasi dari Laravel Breeze (login, register, dll.)
require __DIR__.'/auth.php';