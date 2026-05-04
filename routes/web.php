<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenomoranController;
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

    // Penomoran PIBK
    Route::get('/penomoran', [PenomoranController::class, 'index'])->name('penomoran.index');
    Route::get('/penomoran/create', [PenomoranController::class, 'create'])->name('penomoran.create'); // Pastikan ini di atas jika ada route dengan {id}
    Route::post('/penomoran', [PenomoranController::class, 'store'])->name('penomoran.store');
    Route::get('/penomoran/{id}/cetak', [PenomoranController::class, 'print'])->name('penomoran.print');
    Route::get('/penomoran/{id}', [PenomoranController::class, 'show'])->name('penomoran.show');
    Route::get('/penomoran/{id}/edit', [PenomoranController::class, 'edit'])->name('penomoran.edit');
    Route::put('/penomoran/{id}', [PenomoranController::class, 'update'])->name('penomoran.update');
    Route::delete('/penomoran/{id}', [PenomoranController::class, 'destroy'])->name('penomoran.destroy');

    // Petugas (Cetak diletakkan sebelum Resource)
    Route::get('petugas/{id}/cetak', [PetugasController::class, 'cetak'])->name('petugas.cetak');
    Route::resource('petugas', PetugasController::class);

    // Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';