<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\EskulController;
use App\Http\Controllers\PendaftaranEskulController;

// Group untuk admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/eskul', [EskulController::class, 'index'])->name('eskul.index');
    Route::get('/eskul/create', [EskulController::class, 'create'])->name('eskul.create');
    Route::post('/eskul/store', [EskulController::class, 'store'])->name('eskul.store');
    Route::get('/eskul/edit/{id}', [EskulController::class, 'edit'])->name('eskul.edit');
    Route::put('/eskul/update/{id}', [EskulController::class, 'update'])->name('eskul.update');
    Route::delete('/eskul/destory/{id}', [EskulController::class, 'destory'])->name('eskul.destroy');

    Route::get('/pendaftaran', [PendaftaranEskulController::class, 'index_admin'])->name('pendaftaran.index');
    Route::get('/pendaftaran/{id}', [PendaftaranEskulController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/pendaftaran/update/{id}', [PendaftaranEskulController::class, 'update'])->name('pendaftaran.update');
    Route::post('/pendaftaran/destroy/{id}', [PendaftaranEskulController::class, 'destroy'])->name('pendaftaran.destory');
    Route::get('/laporan/cetak', [PendaftaranEskulController::class, 'cetakPDF'])->name('laporan.cetak');
    // Route::get('/pendaftaransiswa', [PendaftaranEskulController::class, 'index_siswa'])->name('pendaftaran.index');
});

// Group untuk siswa
Route::middleware(['auth', 'verified'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/jadwal', [PendaftaranEskulController::class, 'jadwal'])->name('jadwal.index');
    Route::get('/pendaftaran/create', [PendaftaranEskulController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran/store', [PendaftaranEskulController::class, 'store'])->name('pendaftaran.store');
});

