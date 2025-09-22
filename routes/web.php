<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware(['auth']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->middleware(['auth']);

Route::get('/matakuliah', [MatakuliahController::class, 'index'])->middleware(['auth']);
Route::post('/matakuliah', [MatakuliahController::class, 'store'])->middleware(['auth']);

Route::get('/ruangan', [RuanganController::class, 'index'])->middleware(['auth']);
Route::post('/ruangan', [RuanganController::class, 'store'])->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
