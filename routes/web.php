<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Grup Route yang wajib Login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Penomoran PIBK CRUD lama dihapus sementara untuk desain ulang tampilan.

    // Petugas (Cetak diletakkan sebelum Resource)
    Route::get('petugas/{id}/cetak', [PetugasController::class, 'cetak'])->name('petugas.cetak');
    Route::resource('petugas', PetugasController::class);

    // Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';