<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('matakuliah', MatakuliahController::class);
    Route::resource('ruangan', RuanganController::class);
});

require __DIR__.'/auth.php';
