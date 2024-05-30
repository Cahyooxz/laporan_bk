<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataProfileController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
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
    Route::get('/siswa/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/usiswa/delete/{id}', [SiswaController::class, 'destroy'])->name('usiswa.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/guru/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/data-admin', [AdminController::class, 'data_admin'])->name('users.admin');
    Route::get('/data-guru', [GuruController::class, 'data_guru'])->name('users.guru');
    Route::get('/data-siswa', [SiswaController::class, 'data_siswa'])->name('users.siswa');
    Route::get('/admin', [AdminController::class, 'data_admin'])->name('users.admin');
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
    Route::get('/data-jurusan', [JurusanController::class, 'jurusan'])->name('jurusan');
    Route::get('/data-jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::get('/data-jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::post('/data-jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::put('/data-jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/data-jurusan/destory/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
    Route::get('/surat-peringatan', [SuratPeringatanController::class, 'index'])->name('sp.index');
    Route::get('/surat-peringatan/create', [SuratPeringatanController::class, 'create'])->name('sp.create');
    Route::post('/surat-peringatan/create/add', [SuratPeringatanController::class, 'store'])->name('sp.store');
    Route::get('/surat-peringatan/edit/{id}', [SuratPeringatanController::class, 'edit'])->name('sp.edit');
    Route::put('/surat-peringatan/edit/{id}/update', [SuratPeringatanController::class, 'update'])->name('sp.update');
    Route::delete('/surat-peringatan/destroy/{id}', [SuratPeringatanController::class, 'destroy'])->name('sp.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/admin', [DataProfileController::class, 'admin'])->name('data.profile.admin');
    Route::get('/profile/guru', [DataProfileController::class, 'guru'])->name('data.profile.guru');
    Route::get('/profile/siswa', [DataProfileController::class, 'siswa'])->name('data.profile.siswa');
});

require __DIR__.'/auth.php';
