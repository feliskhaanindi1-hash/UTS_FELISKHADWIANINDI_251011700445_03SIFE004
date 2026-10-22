<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama / Daftar Lowongan Kerja (dengan Search)
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// Halaman Detail Lowongan Kerja
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Proses Kirim Lamaran Pekerjaan (Pemicu Modal Lamar)
Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');