<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\DashboardController;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route dashboard utama
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    // Route utama untuk daftar mobil - admin.index
    Route::get('/mobil', [MobilController::class, 'index'])->name('admin.index');

    // Form tambah mobil
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('admin.create');

    // Form edit mobil
    Route::get('/mobil/{mobil}/edit', [MobilController::class, 'edit'])->name('mobil.edit');

    // Resource MobilController untuk CRUD (tanpa index, create, dan edit yang sudah dibuat sebelumnya)
    Route::resource('mobil', MobilController::class)->except(['index', 'create', 'edit']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mobil/{id}', [MobilController::class, 'show'])->name('user.details');
