<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route dashboard utama
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profile pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengimpor rute untuk autentikasi
require __DIR__ . '/auth.php';

// Route untuk halaman dashboard admin dan resource mobil
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // Route utama untuk daftar mobil
    Route::get('/mobil', [MobilController::class, 'index'])->name('admin.index');

    // Form tambah mobil
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('admin.create');

    // Form edit mobil
    Route::get('/mobil/{mobil}/edit', [MobilController::class, 'edit'])->name('admin.edit');

    // Route untuk melakukan CRUD mobil (menggunakan resource route, namun tanpa index, create, dan edit)
    Route::resource('mobil', MobilController::class)->except(['index', 'create', 'edit']);
});

// Route untuk melihat detail mobil
Route::get('/mobil/{id}/details', [TransaksiController::class, 'show'])->name('user.details');

// Route untuk melihat total transaksi mobil
Route::get('/mobil/{id}/transaksi', [TransaksiController::class, 'transaksi'])->name('user.transaksi');
Route::post('/mobil/{id}/transaksi', [TransaksiController::class, 'processTransaction'])->name('user.transaksi.process');
