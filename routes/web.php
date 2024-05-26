<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edit/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/prestasimu', [PrestasiController::class, 'prestasi'])->name('prestasi');
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi/create/add', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi/edit/{id}', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/edit/{id}/update', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/destroy/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/surat-peringatanmu', [SuratPeringatanController::class, 'surat'])->name('sp');
    Route::get('/surat-peringatan', [SuratPeringatanController::class, 'index'])->name('sp.index');
    Route::get('/surat-peringatan/create', [SuratPeringatanController::class, 'create'])->name('sp.create');
    Route::post('/surat-peringatan/create/add', [SuratPeringatanController::class, 'store'])->name('sp.store');
    Route::get('/surat-peringatan/edit/{id}', [SuratPeringatanController::class, 'edit'])->name('sp.edit');
    Route::put('/surat-peringatan/edit/{id}/update', [SuratPeringatanController::class, 'update'])->name('sp.update');
    Route::delete('/surat-peringatan/destroy/{id}', [SuratPeringatanController::class, 'destroy'])->name('sp.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/surat-peringatan', [SuratPeringatanController::class, 'index'])->name('sp.index');
});

require __DIR__.'/auth.php';
